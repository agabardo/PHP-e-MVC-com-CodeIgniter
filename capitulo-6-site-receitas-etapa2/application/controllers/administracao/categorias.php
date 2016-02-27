<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Categorias extends CI_Controller {
	
	public function __construct(){
		parent::__construct();			
		if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
			redirect(base_url()."administracao/home");
		}
	}
	
	public function index(){
		$this->load->library('table');
		$data['categorias'] = $this->db->get('categorias')->result();
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/categorias',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function adicionar(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria', 'Categoria', 'required');
		$this->form_validation->set_rules('slug_categoria', 'Slug', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$data['categoria'] = $this->input->post('categoria');
			$data['slug_categoria'] = $this->input->post('slug_categoria');
			$this->db->insert('categorias',$data);
			redirect(base_url()."administracao/categorias");
		}
	}
	
	public function editar($id){
		$this->db->where('id_categoria',$id);
		$data['categorias'] = $this->db->get('categorias')->result();
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/editar_categoria',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_alteracao(){		
		$id = $this->input->post('id_categoria');				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria', 'Categoria', 'required');
		$this->form_validation->set_rules('slug_categoria', 'Slug', 'required');
		if($this->form_validation->run() == FALSE)
		{			
			$this->editar($id);
		}
		else
		{
			$data['categoria'] = $this->input->post('categoria');
			$data['slug_categoria'] = $this->input->post('slug_categoria');
			$this->db->where('id_categoria',$id);
			$this->db->update('categorias',$data);
			redirect(base_url()."administracao/categorias");
		}
	}
	
	function excluir($id){
		$this->db->where('id_categoria',$id);
		$this->db->delete('categorias');
		redirect(base_url()."administracao/categorias");
	}
}