<?php

namespace Hcode;

use Rain\Tpl;

class Page{

	private $tpl;//variavel local de rota
	private $options = [];
	private $defaults = [
		"data"=>[]
	];

	public function __construct($opts = array()){

		$this->options = array_merge($this->defaults, $opts);


		$config = array(
			"tpl_dir"       => $_SERVER['DOCUMENT_ROOT']."/views/",//em que pasta vai buscar o arquivo
			"cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/views-cache/",
			"debug"         => false
		);

		Tpl::configure( $config );

		$this->tpl = new Tpl; //isso que vai definir a rota

		$this->setData($this->options['data']);

		$this->tpl->draw('header'); //pegando o cabeçalho da pagina

	}

	private function setData($data = array()){//passando os dados pro templete

		foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}
	}


	public function setTpl($name, $data = array(), $returnHTML = false)
	{

		$this->setData($data);	

		return $this->tpl->draw($name, $returnHTML);
	}

	public function __destruct(){

		$this->tpl->draw('footer'); //pegando o footer a pagina 
	}

}

?>