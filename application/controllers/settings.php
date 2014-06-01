<?php
/**
 * Description of settings
 *
 * @author eric
 */
class Settings extends CI_Controller{
    public function __construct() {
        parent::__construct();
        is_user_logged_in();
    }

    function index(){
        $this->load->view('settings_view');
    }
}