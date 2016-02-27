<div id="conteudo" class="gradiente0 sombra radious">
	<?php
	echo heading("Receitas simplesmente deliciosas",2)
	?>
	<p class='num_resultados'>Sua busca por: <span class='blue'><?php echo $busca;?></span>, encontrou <?php echo count($receitas) ?> resultados.</p>
	<ul>
		<?php foreach($receitas as $receita):?>
			<li class='gradiente1 radious'>
				<?php
				echo anchor(
					'receitas/ver/'.$receita->slug_receita
					,$receita->nome
				)
				?>
			</li>
		<?php endforeach;?>
	</ul>
</div>