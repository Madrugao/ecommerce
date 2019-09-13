<?php 

require_once("vendor/autoload.php"); // Traz as dependencias
  
 // Traz o que precisa para a pagina
use \Slim\Slim; // Traz a rota
use \Hcode\Page;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() { //chamando a linha rota
    
	$page = new Page(); //Chama o construct e coloca o header na tela

	$page->setTpl('index'); //chama o index e junta a página

});

$app->run();

 ?>