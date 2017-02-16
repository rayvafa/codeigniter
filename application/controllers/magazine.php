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

    public function add() {
        // Populate publications.
        $this->load->model('Publication');
        $publications = $this->Publication->get();
        $publication_form_options = array();
        foreach ($publications as $id => $publication) {
            $publication_form_options[$id] = $publication->publication_name;
        }
        // Validation.
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'publication_id',
                'label' => 'Publication',
                'rules' => 'required',
            ),
            array(
                'field' => 'issue_number',
                'label' => 'Issue number',
                'rules' => 'required|is_numeric',
            ),
            array(
                'field' => 'issue_date_publication',
                'label' => 'Publication date',
                'rules' => 'required|callback_date_validation',
            ),
        ));
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if (!$this->form_validation->run()) {
            $this->load->view('magazine_form', array(
                'publication_form_options' => $publication_form_options,
            ));
        }
        else {
            $this->load->view('magazine_form_success');
        }
    }

    /**
     * Date validation callback.
     * @param string $input
     * @return boolean
     */
    public function date_validation($input) {
        $test_date = explode('-', $input);
        if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
            $this->form_validation->set_message('date_validation', 'The %s field must be in YYYY-MM-DD format.');
            return FALSE;
        }
        return TRUE;
    }
}
