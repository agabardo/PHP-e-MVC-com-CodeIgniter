<div id="conteudo" class="gradiente0 sombra radious">
	<h2>Receitas simplesmente deliciosas</h2>
	<div id='grid-home'>
		<?php foreach ($chamadas as $chamada):?>
			<div class='item-grid-home sombra radious'>
				<h3>
					<?php echo $chamada->nome;?>
				</h3>
				<?php
				echo anchor(
					"receitas/ver/". $chamada->slug_receita,
					img('assets/imgs/receitas/'.$chamada->foto)
				)
				?>
				<p>
				<?php
				echo anchor(
					"receitas/ver/" . $chamada->slug_receita,
					word_limiter($chamada->texto,20)
				)
				?>
				</p>
			</div>
		<?php endforeach;?>
	</div>
</div>