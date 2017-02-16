<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Magazine extends CI_Controller {

    /*
     * Index page for Magazine controller
     */
    public function index()
    {
        $data = array();
        $this->load->model('Publication');
        $publication = new Publication();
        $publication->load(0);
        $data['publication'] = $publication;

        $this->load->model('Issue');
        $issue = new Issue();
        $issue->load(0);
        $data['issue'] = $issue;

        $this->load->view('magazines', $data);
        $this->load->view('magazine', $data);
    }

}
