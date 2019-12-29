<?php

namespace controllers;

use core\Controller;

class AccountController extends Controller {

	//Сменить layout для всего контроллера
	// public function before() {
	// 	$this->view->layout = "test";
	// }

	public function loginAction() {
		$this->view->render('Вход');
	}

	public function registerAction() {

		// $this->view->layout = "test";  Сменить layout 

		// $this->view->path = 'test/test'; Сменить директорию view html файла
		$this->view->render('Регистрация!');
	}


}






?>