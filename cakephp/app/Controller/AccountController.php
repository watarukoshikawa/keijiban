<?php

APP::uses('AppController', 'Controller');

class AccountController extends AppController{


	public function login(){

		$this->render('login');
	}

	//ログイン処理
	public function run_login(){
		$this->loadModel('account_tbs');

		$login_data = $this->request->data;

		//ログインチェック
		if (isset($login_data['login_btn'])) {
			//sql文
			$where = array(
				'conditions' => array('id' => $login_data['login_id'], 'pass' => $login_data['login_pass'])
			);


			//SELECT
			//COUNT関数で一件以上あればログイン成功
			$res = $this->account_tbs->find('first', $where);
			if (count($res) > 0) {	//ログイン成功
				//成功時にsessionにaccount_idを渡す。
				CakeSession::write('account_id', $res['account_tbs']['id']);
				CakeSession::write('account_name', $res['account_tbs']['name']);

				$this->redirect('../Thread/thread');

			}else {	//ログイン失敗
				$this->redirect('login');
			}
		}

	}
}
