<div id="content">
	<?php
		echo heading("Alterar receita " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open_multipart('administracao/receitas/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Receitas");
				
				echo form_hidden("id_receita",$receita[0]->id_receita);
				
				echo form_label("Categoria","categoria");				
				foreach($categorias as $categoria){
					$array[$categoria->id_categoria] = $categoria->categoria;
				}				
				echo form_dropdown('categoria', $array, $receita[0]->categoria);
				
				echo form_label("Nome","nome");
				$atributos = array(
					"name"	=>	"nome",
					"id"	=>	"nome",
					"value"	=>	$receita[0]->nome
				);
				echo form_input($atributos);
				
				echo form_label("Slug","slug_receita");
				$atributos = array(
					"name"	=>	"slug_receita",
					"id"	=>	"slug_receita",
					"value"	=>	$receita[0]->slug_receita
				);
				echo form_input($atributos);
				
				echo form_label("Texto da receita","texto");
				$atributos = array(
					"name"	=>	"texto",
					"id"	=>	"texto",
					"value"	=>	$receita[0]->texto
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
				
				echo form_submit("btnSubmit","Alterar");
			echo form_fieldset_close();
		echo form_close();
	?>
</div>