<div id="top">
	<span class='saudacao'>
		Seja bem vindo: 
		<?php
		echo $this->session->userdata('usuario');
		echo " | ";
		echo anchor(base_url(). 'administracao/home/logout', 'Sair', 'title="Efetuar Logout"');
		?>
	</span>
	<div id="menu">
		<?php
			$menu[] = anchor(base_url(), 'Home', 'title="Voltar para a Home"');
			$menu[] = anchor(base_url(). 'administracao/categorias', 'Categorias', 'title="Administrar Categorias"');
			$menu[] = anchor(base_url(). 'administracao/receitas', 'Receitas', 'title="Administrar Receitas"');
			$menu[] = anchor(base_url(). 'administracao/usuarios', 'Usuários', 'title="Administrar Usuarios"');
			echo ul($menu);
		?>
	</div>
</div>