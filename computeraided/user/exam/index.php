<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= ' View exam';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= ' Add exam';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= ' Modify exam';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = ' View exam Detail';
		break;
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= ' View exam';
}




$script    = array('exam.js');

require_once '../include/template.php';
?>
