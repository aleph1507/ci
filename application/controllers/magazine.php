<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {
	/***
	*   index page for the magazine controller
	***/
	public function index(){
		$this->load->view('magazines'); 
	}

}