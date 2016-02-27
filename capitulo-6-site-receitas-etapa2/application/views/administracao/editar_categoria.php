<div id="content">
	<?php
		echo heading("Cadastrar categoria " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/categorias/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Categorias");
				
				echo form_hidden("id_categoria",$categorias[0]->id_categoria);
				
				echo form_label("Categoria","categoria");
				$atributos = array(
					"name"	=>	"categoria",
					"id"	=>	"categoria",
					"value"	=>	$categorias[0]->categoria
				);
				echo form_input($atributos);
				
				echo form_label("Slug","slug_categoria");
				$atributos = array(
					"name"	=>	"slug_categoria",
					"id"	=>	"slug_categoria",
					"value"	=>	$categorias[0]->slug_categoria
				);
				echo form_input($atributos);
				
				echo form_submit("btnSubmit","Alterar");
			echo form_fieldset_close();
		echo form_close(); 
	?>
</div>