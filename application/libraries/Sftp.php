<?php
    
    if (!defined('BASEPATH')) exit('No direct script access allowed');  

    set_include_path(APPPATH . '/third_party/phpsec');
    require_once APPPATH."/third_party/phpsec/Net/SFTP.php"; 
    
    class Sftp {}