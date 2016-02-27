<div id="content">
	<?php
		echo heading("Cadastrar receita " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open_multipart('administracao/receitas/adicionar', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Receitas");
				
				echo form_label("Categoria","categoria");				
				foreach($categorias as $categoria){
					$array[$categoria->id_categoria] = $categoria->categoria;
				}				
				echo form_dropdown('categoria', $array);
				
				echo form_label("Nome","nome");
				$atributos = array(
					"name"	=>	"nome",
					"id"	=>	"nome",
					"value"	=>	set_value('nome')
				);
				echo form_input($atributos);
				
				echo form_label("Slug","slug_receita");
				$atributos = array(
					"name"	=>	"slug_receita",
					"id"	=>	"slug_receita",
					"value"	=>	set_value('slug_receita')
				);
				echo form_input($atributos);
				
				echo form_label("Texto da receita","texto");
				$atributos = array(
					"name"	=>	"texto",
					"id"	=>	"texto",
					"value"	=>	set_value('texto')
				);
				echo form_textarea($atributos);
				
				
				echo form_label("Foto","userfile");
				echo "<br/>";
				$atributos = array(
					"name"	=>	"userfile",
					"id"	=>	"userfile"
				);
				echo form_upload($atributos);
				echo "<br/>";
				
				echo form_submit("btnSubmit","Adicionar");
			echo form_fieldset_close();
		echo form_close();
		//Fim do formulário...
		
		echo heading("Receitas Cadastradas " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		//Início da listagem de categorias...
		$array_receitas = array();
		foreach($receitas as $receita){
			$array_receitas[] = array(
				
				anchor(
					base_url() . "administracao/receitas/excluir/" . $receita->id_receita,
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a excluão desta receita?');")
				),
							
				anchor(
					base_url() . "administracao/receitas/editar/".$receita->id_receita,
					img('assets/imgs/gear.gif'),
					array('onclick'=>"return confirm('Confirma a alteração desta receita?');")
				),
				
				$receita->nome,
			);
		}
		
		$this->table->set_heading('Excluir','Editar','Nome da Receita');
		echo "<div class='wraper_table'>";
			echo $this->table->generate($array_receitas);
		echo "</div>"; 
	?>
</div>