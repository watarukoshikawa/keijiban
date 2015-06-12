<?php

APP::uses('AppController', 'Controller');

class AccountController extends AppController{



	public function login(){

		$this->render('login');
	}

	//ログイン処理
	public function run_login(){
	$this->loadModel('users');

		$login_data = $this->request->data;

		//ログインチェック
		if (isset($login_data['login_btn'])) {
			//sql文
			$where = array(
				'conditions' => array('id' => $login_data['login_id'], 'pass' => $login_data['login_pass'])
			);

			//SELECT
			//COUNT関数で一件以上あればログイン成功
			$res = $this->users->find('count', $where);

			if ($res > 0) {	//ログイン成功
				//成功時にaccount_idを渡す。
				$input_id = $login_data['login_id'];
				$this->thread($input_id);

			}else {	//ログイン失敗
				$this->redirect('login');
			}
		}

	}
}
