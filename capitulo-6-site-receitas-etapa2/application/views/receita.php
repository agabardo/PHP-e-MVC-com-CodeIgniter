<div id="conteudo" class="gradiente0 sombra radious">
	<?php 
	echo heading("Receitas simplesmente deliciosas",2);
	?>
	<div id="receita">
	<?php
	foreach($receita as $rec){	
		echo heading($rec->nome,3);
		echo img('assets/imgs/receitas/'.$rec->foto);
		echo "<p>" . nl2br($rec->texto) . "</p>";
	}	
	?>
	<a href="javascript:history.go(-1)">Voltar</a> | <a href="javascript:self.print()">Imprimir</a> 
	</div>
</div>