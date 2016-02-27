<?php echo doctype('xhtml1-trans'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Meu website de receitas - Administração</title>
		<?php
		$meta = array(
	        array('name' => 'robots', 'content' => 'NOINDEX, NOFOLLOW'),
	        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
    	);
		echo meta($meta);
		echo link_tag('assets/imgs/fork.ico', 'shortcut icon', 'image/ico');
		echo link_tag('assets/css/admin.css');
		?>
	</head>
<body>