<div id="menu_de_categorias" class="gradiente0 sombra radious">
	<h2>Categorias</h2>
	<ul>
		<?php foreach($categorias as $cat):?>
			<li class='gradiente1 radious'>
				<?php
				echo anchor(
					'receitas/categoria/'.$cat->slug_categoria,
					$cat->categoria
				);
				?>
			</li>
		<?php endforeach;?>
	</ul>
</div>