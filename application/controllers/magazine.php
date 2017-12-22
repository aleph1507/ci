<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {
	/***
	*   index page for the magazine controller
	***/
	public function index(){

		$this->output->delete_cache();
		$data = array();
		$this->load->model('Publication');
		$publication = new Publication();
		$publication->load(1);
		$data['publication'] = $publication;

		$this->load->model('Issue');
		$issue = new Issue();
		$issue->load(1);
		$data['issue'] = $issue;

		$this->load->view('magazines');
		$this->load->view('magazine', $data);

		// $this->load->model('Publication');
		// $this->Publication->publication_name = 'Sandy Shore';
		// $this->Publication->save();
		// echo '<tt><pre>' . var_export($this->Publication, TRUE) . '</pre></tt>';

		// $this->load->model('Issue');
		// $issue = new Issue();
		// $issue->publication_id = $this->Publication->publication_id;
		// $issue->issue_number = 2;
		// $issue->issue_date_publication = date('2013-02-01');
		// $issue->save();
		// echo '<tt><pre>' . var_export($issue, TRUE) . '</pre></tt>';

		// $this->load->view('magazines'); 

	}

}