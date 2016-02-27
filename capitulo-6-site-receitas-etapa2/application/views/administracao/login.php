<?php
$atributos = array('class' => 'formlogin gradiente1 radius shadow', 'id' => 'formlogin');
echo form_open(base_url().'administracao/home/login',$atributos);
	echo form_fieldset('Efetuar Login');
		echo form_label('Usuário', 'usuario');
		echo form_input('usuario');
		echo form_label('Senha', 'senha');
		echo form_password('senha');
		echo form_submit('btnSubmit','Efetuar Login');
	echo form_fieldset_close(); 
echo form_close();
?>