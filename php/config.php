<?php
	
	$db = array(
	    'link'		=>	null,
	    'host'		=>	'localhost',
	    'user'		=>	'root',
	    'pass'		=>	'12345678',
	    'db'		=>	'bishe',
	    'charset'	=>	'utf8'
	);
	$db['link'] = @mysql_connect($db['host'],$db['user'],$db['pass']);
	$db['link'] || exit("file connect ".$db['host']);
	mysql_select_db($db['db']);
	mysql_query('set names '.$db['charset']);
?>