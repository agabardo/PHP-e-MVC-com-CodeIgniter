<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
	
	public function index()	{
		$this->load->view('welcome_message');
	}
	
	function olamundo(){
		$this->load->view('ola_mundo.html');
	}
}