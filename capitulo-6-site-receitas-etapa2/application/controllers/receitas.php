<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Receitas extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function categoria($slug_categoria = null){	
		//Recebendo os dados das categoias.
		$data['categorias'] = $this->db->get('categorias')->result();
		
		//Criando querys SQL com JOIN pelo uso do Active Record.		
		$this->db->select('r.id_receita,r.nome,r.slug_receita,r.foto,c.categoria');
		$this->db->from('receitas r');
		$this->db->join('categorias c','c.id_categoria = r.categoria','inner');
		$this->db->where('c.slug_categoria',$slug_categoria);
		$this->db->order_by('r.nome','ASC');		
		$data2['receitas'] = $this->db->get()->result();
		
		//Carregando as views.
		$this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('menu_categorias' , $data);
		$this->load->view('categoria', $data2);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}
	
	public function ver($slug_receita = null){
		//Recebendo os dados das categoias.
		$data['categorias'] = $this->db->get('categorias')->result();
		
		//Recebendo os dados da receita.
		$this->db->where('slug_receita',$slug_receita);
		$data2['receita'] = $this->db->get('receitas')->result();
		
		//Carregando as views.
		$this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('menu_categorias' , $data);
		$this->load->view('receita', $data2);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}

	public function buscar(){
		$data['categorias'] = $this->db->get('categorias')->result();
		
		$busca = $this->input->post('busca');
		$data2['busca'] = $busca;
		
		$this->db->like('nome',$busca);
		$this->db->or_like('texto',$busca);
		$data2['receitas'] = $this->db->get('receitas')->result();
		
		$this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('menu_categorias' , $data);
		$this->load->view('resultado_busca', $data2);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}

}