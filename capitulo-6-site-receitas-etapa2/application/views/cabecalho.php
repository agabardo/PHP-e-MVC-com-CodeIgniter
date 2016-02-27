<div id="cabecalho" class="gradiente0 sombra radious">
	<?php
	echo img('assets/imgs/logomarca.png');
	?>
	<div id="formbusca">
		<?php			
			echo form_open(base_url().'receitas/buscar');		
			echo form_label("Buscar","busca");
			$data = array('name'=>'busca','id'=>'busca','class'=> 'campo_busca');
			echo form_input($data);
			echo form_submit('button_buscar', 'Buscar');
			echo form_close();
		?>
	</div>
</div>
<br class='clear-both'/>