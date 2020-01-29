<?php


namespace core;

use core\View;

class Router {

	protected $routes = [];
	protected $params = [];

	public function __construct() {
		$arr = require 'config/routes.php';
		foreach ($arr as $key => $val) {
			$this->add($key, $val);
		}
	}

	public function add($route, $params) {
		$route = '#^' . $route . '$#';
		$this->routes[$route] = $params;
	}

	public function match() {
		/* url из строки браузера */
		$url = trim($_SERVER['REQUEST_URI'], '/');
		
		foreach ($this->routes as $route => $params) {
			/* ищем совпадение url и масива с файла routes*/
			if (preg_match($route, $url, $match)) {
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function run() {
		if($this->match()){
			$path = 'controllers\\' . ucfirst($this->params['controller']) . 'Controller';
			if (class_exists($path)) {
				$action = $this->params['action'].'Action';
				if(method_exists($path, $action)) {
					$controller = new $path($this->params);
					$controller->$action();
				} else {
					View::errorCode(404);
				}
			}
			else {
				View::errorCode(404);
			}
			// echo '<p>controllers: <b>' . $this->params['controller']  . '</b></p>';
			// echo '<p>action: <b>' . $this->params['action']  . '</b></p>';
			// dd($this->params);
		}
		else {
			View::errorCode(404);
		}
	}
}


?>