<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Magazine extends CI_Controller {

    /*
     * Index page for Magazine controller
     */
    public function index()
    {
        $this->load->view('magazines');
    }

}
