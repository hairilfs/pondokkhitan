<?php 

function hash_adm_password($string){

	$ci =& get_instance();

	$encrypt = $ci->config->item('encryption_key');
	$password = md5('adm'.$encrypt.$string);

	return $password;
}