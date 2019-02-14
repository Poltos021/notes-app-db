<?php

class Application {

	public function execute(){
		session_start();

		require_once ROOT_DIR . '/config/db.php';
		require_once ROOT_DIR . '/config/includes.php';
		
		ob_start();
		$this->action(
			$this->router()
		);
		$c = ob_get_contents();
		ob_end_clean();
		return $c;
	}

	private function router(){
		$action = 'index';
		if(array_key_exists('action', $_GET)){
			$a = $_GET['action'];
			$a = explode('/', $a)[0];
			if(file_exists(ROOT_DIR . '/actions/' . $a . '.php')){
				if(file_exists(ROOT_DIR . '/html/' . $a . '.phtml')){
					$action = $a;
				} else {
					die('ERROR: file html/' . $a . '.phtml is not exists!');
				}
			} else {
				die('ERROR: file actions/' . $a . '.php is not exists!');
			}
		}
		return $action;
	}

	private function action($_action_name){
		require ROOT_DIR . '/actions/' . $_action_name . '.php';
		require ROOT_DIR . '/layouts/default.phtml';
	}

}