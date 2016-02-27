<div id="conteudo" class="gradiente0 sombra radious">
	<?php
	echo heading("Receitas simplesmente deliciosas",2);
	if(count($receitas)>0){
	?>
	<ul>
		<?php 
		echo heading($receitas[0]->categoria,3);
		
		foreach($receitas as $receita):?>
			<li class='gradiente1 radious'>
				<?php
				echo anchor(
				'receitas/ver/'.$receita->slug_receita,
				$receita->nome
				)
				?>
			</li>
		<?php endforeach;?>
	</ul>
	<?php
	}
	else{
		echo "<p class='zero-resultados'>:-( Nunhuma receita encontrada nesta categoria.</p>";
	}
	?>
</div>