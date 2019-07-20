<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PKCC_Model extends CI_Model {

    protected $table = '';
    protected $primary_key = 'id';
    protected $timestamps = false;
    protected $default = array();
    protected $authors = false;
    protected $author_m = 'users/users_m';
    protected $author_field = 'username';
    protected $soft_delete = false;
    protected $creators = array();
    protected $updaters = array();
    protected $objects;
    protected $directory;
    protected $relations = array();
    protected $log_data_changes = 'log_data_changes';

    public function __construct()
    {
        $this->load->database();
        $this->load->library('auth');
    }

    public function __call($method, $params) {
        call_user_func_array(array($this->db, $method), $params);
        return $this;
    }

    public function put_directory($model) {
        $parse = explode('/', $model);
        unset($parse[count($parse) - 1]);
        if (count($parse) > 0) {
            $this->directory = implode('/', $parse);
        }
        return $this;
    }

    public function put_class($model) {
        $parse = explode('/', $model);
        $this->class = end($parse);
        return $this;
    }

    public function fetch_directory() {
        return $this->directory;
    }

    public function fetch_class() {
        return $this->class;
    }

    public function table() {
        return $this->table;
    }

    public function primary_key() {
        return $this->primary_key;
    }

    public function view($view) {
        $this->{'view_'.$view}();
        return $this;
    }

    public function scope($scope) {
        if (is_array($scope)) {
            foreach ($scope as $method) {
                $this->{'scope_'.$method}();
            }
        } else {
            $this->{'scope_'.$scope}();
        }
        return $this;
    }

    public function get() {
        if ($this->soft_delete) {
            return $this->get_undeleted();
        }
        return $this->_get();
    }

    public function get_undeleted() {
        if (!$this->soft_delete) {
            $this->ex->soft_delete_inactive($this);
        }
        $parse = explode('.', $this->table);
        $aliases = end($parse);
        $this->db->where($aliases.'.deleted', 0);
        return $this->_get();
    }

    public function get_with_deleted() {
        if (!$this->soft_delete) {
            $this->ex->soft_delete_inactive($this);
        }
        return $this->_get();
    }

    public function get_deleted() {
        if (!$this->soft_delete) {
            $this->ex->soft_delete_inactive($this);
        }
        $this->db->where($aliases.'.deleted', 1);
        return $this->_get();
    }

    protected function _get() {
        $parse = explode('.', $this->table);
        $aliases = end($parse);
        $result = $this->db->get($this->table.' '.$aliases)->result();
        if ($this->authors) {
            $result = $this->set_author($result);
        }
        return $result;
    }

    public function find($id) {
        $parse = explode('.', $this->table);
        $aliases = end($parse);
        $result = $this->db->where($aliases . '.' . $this->primary_key, $id)
            ->get($this->table.' '.$aliases)
            ->row();
        if ($this->authors) {
            $result = $this->set_author($result);
        }
        return $result;
    }

    public function find_or_fail($id) {
        $model = $this->find($id);
        if (!$model) {
            $this->ex->model_not_found($this);
        }
        return $model;
    }

    public function first() {
        $result = $this->db->limit(1)
            ->get($this->table)
            ->row();
        if ($this->authors) {
            $result = $this->set_author($result);
        }
        return $result;
    }

    public function first_or_fail() {
        $model = $this->first();
        if (!$model) {
            $this->ex->model_not_found($this);
        }
        return $model;
    }

    public function count_all_results() {
        return $this->db->count_all_results($this->table);
    }

    public function insert($record) {
        $record = $this->fill($record);
        if ($this->authors) {
            $record['created_by'] = $this->auth->{$this->auth->username_field};
        }
        if ($this->timestamps) {
            $record['created_at'] = date('Y-m-d H:i:s');
        }
        $model = $this->db->insert($this->table, $record);
        if ($model) {
            if (isset($record[$this->primary_key])) {
                $result = $this->find($record[$this->primary_key]);
            } else {
                $result = $this->find_insert_id();
            }
            
            return $result;
        }
        return $model;
    }

    public function insert_id() {
        return $this->db->select_max($this->primary_key())->get($this->table)->row()->{$this->primary_key()};
    }

    public function find_insert_id() {
        return $this->find($this->insert_id());
    }

    public function insert_batch($records) {
        foreach ($records as $key => $record) {
            $records[$key] = $this->fill($record);
            if ($this->authors) {
                $records[$key]['created_by'] = $this->auth->{$this->auth->username_field};
            }
            if ($this->timestamps) {
                $records[$key]['created_at'] = date('Y-m-d H:i:s');
            }
        }
        return $this->db->insert_batch($this->table, $records);
    }

    public function update($id, $record = null) {
        if ($record) {
            $old = $this->find_or_fail($id);
            $this->db->where($this->table.'.'.$this->primary_key, $old->{$this->primary_key});
        } else {
            $record = $id;
        }
        if ($record) {
            $record = $this->fill($record, false);
        }
        if ($this->authors) {
            $record['updated_by'] = $this->auth->{$this->auth->username_field};
        }
        if ($this->timestamps) {
            $record['updated_at'] = date('Y-m-d H:i:s');
        }
        $result = $this->db->update($this->table, $record);
        if (!is_array($id)) {
            $new = $this->find_or_fail($id);
            
        }
        return $result;
    }

    public function delete($id = null) {
        if ($id) {
            $old = $this->find_or_fail($id);
            $this->db->where($this->table.'.'.$this->primary_key, $old->{$this->primary_key});
        }
        if ($this->soft_delete) {
            $result = $this->db->update($this->table, array(
                'deleted' => 1
            ));
            if ($id) {
                $new = $this->find_or_fail($id);
                
            }
            return $result;
        }
        $result = $this->db->delete($this->table);
        if ($id) {
            
        }
        return $result;
    }

    public function restore($id = null) {
        if (!$this->soft_delete) {
            $this->ex->soft_delete_inactive($this);
        }
        if ($id) {
            $result = $this->find_or_fail($id);
            $this->db->where($this->table.'.'.$this->primary_key, $result->{$this->primary_key});
        }
        return $this->db->update($this->table, array(
            'deleted' => 0
        ));
    }

    public function force_delete($id = null) {
        if (!$this->soft_delete) {
            $this->ex->soft_delete_inactive($this);
        }
        if ($id) {
            $result = $this->find_or_fail($id);
            $this->db->where($this->table.'.'.$this->primary_key, $result->{$this->primary_key});
        }
        return $this->db->delete($this->table);
    }

    public function empty() {
        return $this->db->empty_table($this->table);
    }

    public function enum($name, $value = null) {
        $enum = $this->{'enum_'.$name}();
        if (!is_null($value)) {
            if (isset($enum[$value])) {
                return $enum[$value];
            } else {
                return null;
            }
        }
        return $enum;
    }

    protected function fill($record = array(), $set_default = true) {
        $data = array();
        if ($set_default) {
            foreach ($this->default as $field => $value) {
                $data[$field] = $value;
            }
        }
        foreach ($this->fillable as $field) {
            if (array_key_exists($field, $record)) {
                if ($record[$field] !== '' && !is_null($record[$field])) {
                    $data[$field] = $this->set_record($field, $record[$field]);
                } else {
                    $data[$field] = null;
                }
            }
        }
        if ($this->soft_delete) {
            $data['deleted'] = 0;
        }
        $this->validate($data);
        return $data;
    }

    protected function set_record($field, $value) {
        if (method_exists($this, 'set_'.$field)) {
            return $this->{'set_'.$field}($value);
        } else {
            return $value;
        }
    }

    public function validate($record) {
        $parse = explode('.', $this->table);
        $table = end($parse);
        $fields = $this->db->field_data($table);
        $validation_errors = array();
        foreach ($fields as $field) {
            if ($field->max_length) {
                if (isset($record[$field->name])) {
                    if (strlen($record[$field->name]) > $field->max_length) {
                        $validation_errors[$field->name] = $this->localization->lang('db_validation_max_length', array('field' => $field->name, 'max_length' => $field->max_length));
                    }
                }
            }
        }
        if (count($validation_errors) > 0) {
            $message = '';
            foreach ($validation_errors as $validation_error) {
                $message .='<p>'.$validation_error.'</p>';
            }
            if ($this->input->is_ajax_request()) {
                $response = array(
                    'success' => false,
                    'message' => $message,
                    'validation' => $validation_errors
                );
                $this->output->set_content_type('application/json')->set_output(json_encode($response))->_display();
                exit;
            } else {
                $this->session->set_flashdata('validation_message', $message);
                $this->redirect->with_input()->back();
            }
        }
    }

    // public function authors() {
    //     $this->load->model($this->author_m);
    //     $parse_authors_m = explode('/', $this->author_m);
    //     $authors_m = end($parse_authors_m);
    //     $rs = $this->$authors_m->where($this->author_field.' IN (SELECT DISTINCT created_by FROM '.$this->table.')', null, false)
    //     ->get();
    //     foreach ($rs as $r) {
    //         $this->creators[$r->{$this->author_field}] = $r;
    //     }
    //     $rs = $this->$authors_m->where($this->author_field.' IN (SELECT DISTINCT updated_by FROM '.$this->table.')', null, false)
    //     ->get();
    //     foreach ($rs as $r) {
    //         $this->updaters[$r->{$this->author_field}] = $r;
    //     }
    //     return $this;
    // }

    protected function set_author($data) {
        if (!$data) {
            return $data;
        }
        if (is_array($data)) {
            foreach ($data as $i => $row) {
                $row = $this->set_author($row);
                $data[$i] = $row;
            }
            return $data;
        } else {
            if ($this->creators) {
                if (isset($data->created_by)) {
                    $data->creator = isset($this->creators[$data->created_by]) ? $this->creators[$data->created_by] : null;
                }
            }
            if ($this->updaters) {
                if (isset($data->updated_by)) {
                    $data->updater = isset($this->updaters[$data->updated_by]) ? $this->creators[$data->updated_by] : null;
                }
            }
            return $data;
        }
    }

    public function get_objects($feature_id = null, $action_id = null) {
        if (!$this->objects) {
            $this->objects($feature_id, $action_id);
        }
        return $this->objects;
    }

    public function scope_object_permissions() {
        if ($this->config->item('authorization')) {
            if (count(get_object_vars($this->get_objects())) > 0) {
                foreach ($this->get_objects() as $object) {
                    if (count($object->permissions())) {
                        $this->db->group_start();
                        $permissions = $object->permissions();
                        $parse = explode('.', $this->table);
                        $table = end($parse);
                        if (strpos($object->attribute(), '.')) {
                            $column = $object->attribute();
                        } else {
                            $column = $table.'.'.$object->attribute();
                        }
                        if ($permissions[0]->operation == '=' && is_null($permissions[0]->to)) {
                            $this->like($column.'::text', $permissions[0]->from, 'none', FALSE);
                        } elseif ($permissions[0]->operation == '=' && $permissions[0]->to) {
                            $this->db->group_start()
                                ->where($column.' >= ', $permissions[0]->from)
                                ->where($column.' <= ', $permissions[0]->to)
                                ->group_end();
                        } else {
                            $this->db->where($column.' '.$permissions[0]->operation.' ', $permissions[0]->from);
                        }
                        unset($permissions[0]);
                        foreach ($permissions as $permission) {
                            if ($permission->operation == '=' && is_null($permission->to)) {
                                $this->db->or_like($column.'::text', $permission->from, 'none', FALSE);
                            } elseif ($permission->operation == '=' && $permission->to) {
                                $this->db->or_group_start()
                                    ->where($column.' >= ', $permission->from)
                                    ->where($column.' <= ', $permission->to)
                                    ->group_end();
                            } else {
                                $this->db->or_where($column.' '.$permission->operation.' ', $permission->from);
                            }
                        }
                        $this->db->group_end();
                    }
                }
            } else {
                $parse = explode('.', $this->table);
                $aliases = end($parse);
                $this->db->where($aliases.'.'.$this->primary_key, NULL);
            }
        }
    }
}