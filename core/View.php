<?php

namespace core;

class View {

	public $path;
	public $route;
	public $layout = 'default';


	public function __construct($route){
		$this->route = $route;
		$this->path = $route['controller'] . '/' . $route['action'];
	}

	public function render($title, $vars = []) {
		
		if(file_exists('view/' . $this->path . '.php')){
			ob_start();
			require 'view/' . $this->path . '.php';
			$content = ob_get_clean();
			require 'view/layouts/' . $this->layout . '.php';
		} else {
			echo "Вид не найден!";
		}
		
	}



}

?>