<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){					
		$data['categorias'] = $this->db->get('categorias')->result();
		
		$this->db->order_by('id_receita','random');
		$data2['chamadas'] = $this->db->get('receitas',4)->result();
		
		$this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('menu_categorias' , $data);
		$this->load->view('conteudo', $data2);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}	
}