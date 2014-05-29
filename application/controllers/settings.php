<?php
/**
 * Description of settings
 *
 * @author eric
 */
class Settings extends CI_Controller{

    function index(){
        $this->load->view('settings_view');
    }
}