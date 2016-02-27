<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Receitas extends CI_Controller {
	
	public function __construct(){
		parent::__construct();			
		if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
			redirect(base_url()."administracao/home");
		}
	}
	
	public function index(){
		$this->load->library('table');
		$data['categorias'] = $this->db->get('categorias')->result();
		$data['receitas'] = $this->db->get('receitas')->result();
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/receitas',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_alteracao(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria', 'Categoria', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('slug_receita', 'Slug', 'required');
		$this->form_validation->set_rules('texto', 'Texto', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$config['upload_path'] = './assets/imgs/receitas';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1024';
			$config['max_width']  = '800';
			$config['max_height']  = '600';
			$config['encrypt_name'] = true;		
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$arquivo_upado = $this->upload->data();
				$dados['foto'] = $arquivo_upado['file_name'];
			}	
			
			$dados['nome'] = $this->input->post('nome');
			$dados['slug_receita'] = $this->input->post('slug_receita');
			$dados['texto'] = $this->input->post('texto');
			$dados['categoria'] = $this->input->post('categoria');
			
			$this->db->where('id_receita',$this->input->post('id_receita'));
			$this->db->update('receitas',$dados);
			redirect(base_url()."administracao/receitas");
		}
	}
	
	
	public function adicionar(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria', 'Categoria', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('slug_receita', 'Slug', 'required');
		$this->form_validation->set_rules('texto', 'Texto', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$config['upload_path'] = './assets/imgs/receitas';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1024';
			$config['max_width']  = '800';
			$config['max_height']  = '600';
			$config['encrypt_name'] = true;		
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				echo $this->upload->display_errors();			
				echo "<a href='javascript:history.go(-1)'>Voltar e corrigir.</a>";
			}	
			else{
				$dados['nome'] = $this->input->post('nome');
				$dados['slug_receita'] = $this->input->post('slug_receita');
				$dados['texto'] = $this->input->post('texto');
				$dados['categoria'] = $this->input->post('categoria');
				$arquivo_upado = $this->upload->data();
				$dados['foto'] = $arquivo_upado['file_name'];
				$this->db->insert('receitas',$dados);
				redirect(base_url()."administracao/receitas");
			}
		}
	}

	public function editar($receita = null){
		$data['categorias'] = $this->db->get('categorias')->result();
		
		$this->db->where('id_receita',$receita);
		$data['receita'] = $this->db->get('receitas')->result();
		
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/editar_receita',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function excluir($id){
		$this->db->where('id_receita',$id);
		$this->db->delete('receitas');
		redirect(base_url()."administracao/receitas");
	} 
}