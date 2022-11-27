<?php
require '../Modules/categories.php';
require '../Modules/login.php';
require '../Modules/logout.php';
require '../Modules/database.php';
require '../Modules/common.php';
require '../Modules/fietsen.php';
	


session_start();
//var_dump($_SESSION);
//var_dump($_POST);
$message="";

$request = $_SERVER['REQUEST_URI'];

$params = explode("/", $request);
//print_r($request);
$title = "HealthOne";
$titleSuffix = "";

//$params[1] is de action
//$params[2] is een extra getal die de action nodig heeft om zijn taak uit te voeren
switch ($params[1]) {

    case 'categories':
        $titleSuffix = ' | Categories';
        $categories = getCategories();
        //var_dump($categories);die;
        include_once "../Templates/categories.php";
        break;

    case 'auto':
	    $titleSuffix = ' | '.$params[2];
		$auto = $params[2];
        include_once "../Templates/auto.php";
        break;
	
	case 'about':
		$titleSuffix = ' | '.$params[1];
		include_once "../Templates/about.php";
		break;
	
	case 'mercedes':
		$titleSuffix = ' | '.$params[1];
		include_once "../Templates/mercedes.php";
		break;
	


    case 'product':
        break;
	
	case 'fietsen':
		
		$titleSuffix = ' | fietsen';
		$fietsen= getFietsen();
		include_once "../Templates/fietsen.php";
		break;
	
	case 'detail':
		$titleSuffix = ' | detail';
		$fiets= getFiets($params[2]);
		include_once "../Templates/detail.php";
		break;
	
	case 'update':
		$titleSuffix = ' | update';
		$update = "updateFiets";
		$fiets= getFiets($params[2]);
		include_once "../Templates/form.php";
		break;
	
	case 'insert':
		$titleSuffix = ' | insert';
		$insert = 'insertFiets';
		include_once "../Templates/form.php";
		break;
	
	case 'delete':
		$fietsen= getFietsen();
		deleteFiets($params[2]);
		include_once "../Templates/fietsen.php";
		break;
		
    case 'login':
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
        break;

    case 'logout':
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
        break;
	
	case 'register':
		$titleSuffix = ' | Home';
		include_once "../Templates/home.php";
		break;
		

    case 'contact':
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
        break;

    case 'admin':
        include_once ('admin.php');
        break;

    case 'member':
        include_once ('member.php');
        break;

    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}







