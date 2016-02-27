<div id="content">
	<?php
		echo heading("Cadastrar categoria " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/categorias/adicionar', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Categorias");
				
				echo form_label("Categoria","categoria");
				$atributos = array(
					"name"	=>	"categoria",
					"id"	=>	"categoria",
					"value"	=>	set_value('categoria')
				);
				echo form_input($atributos);
				
				echo form_label("Slug","slug_categoria");
				$atributos = array(
					"name"	=>	"slug_categoria",
					"id"	=>	"slug_categoria",
					"value"	=>	set_value('slug_categoria')
				);
				echo form_input($atributos);
				
				echo form_submit("btnSubmit","Adicionar");
			echo form_fieldset_close();
		echo form_close();
		//Fim do formulário...
		
		echo heading("Categorias Cadastradas " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		//Início da listagem de categorias...
		$array_categorias = array();
		foreach($categorias as $categoria){
			$array_categorias[] = array(
				
				anchor(
					base_url() . "administracao/categorias/excluir/" . $categoria->id_categoria,
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a excluão desta categoria');")
				),
							
				anchor(
					base_url() . "administracao/categorias/editar/".$categoria->id_categoria,
					img('assets/imgs/gear.gif'),
					array('onclick'=>"return confirm('Confirma a alteração desta categoria');")
				),
				
				$categoria->categoria,
				$categoria->slug_categoria
			);
		}
		
		$this->table->set_heading('Excluir','Editar','Categoria','Slug');
		echo "<div class='wraper_table'>";
			echo $this->table->generate($array_categorias);
		echo "</div>"; 
	?>
</div>