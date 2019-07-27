<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Users_m extends PKCC_Model {
        protected $table = 'users'; 
        protected $primary_key = 'id'; 
        protected $fillable = array('username', 'password', 'email', 'first_name', 'last_name', 'full_name', 'access'); 
        protected $authors = TRUE;
        protected $timestamps = TRUE;
        protected $set_default = [];

        public function scope_active() {
            $this->db->where('active', 1);
        }

        public function scope_inactive() {
            $this->db->where('active', 0);
        }

        public function enum_active() {
            return array(
                0 => 'Inactive',
                1 => 'Active'
            );
        }

        public function set_password($value) {
            return md5($value);
        }

    }