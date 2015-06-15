<?php
APP::uses('AppController', 'Controller');

class AccountmasterController extends AppController {
	//初期画面表示
	public function show_main(){
		$this->render('account_master');
	}
	//ログイン処理
	public function run_login(){
		$this->loadModel('account_tbs');

		$login_data = $this->request->data;
		var_dump($login_data);
		if($login_data){
			$where = array(
				'conditions' => array('id' => $login_data['login_id'], 'pass' => $login_data['login_pass'])
			);
			$checker = $this->account_tbs->find('first',$where);
			if(count($checker)){
				CakeSession::write('account_id', $checker['account_tbs']['id']);
				CakeSession::write('account_name', $checker['account_tbs']['name']);
				$this->show_account();
			}else{
				//login失敗
				$this->show_main();
			}
		}


	}
	//account一覧表示
	public function show_account(){
		$this->loadModel('account_tbs');
		$this->set('table_data', $this->account_tbs->find('all'));
		$this->render('account_master_data');


	}
	//登録画面表示
	public function show_regist(){
		$this->render('account_master_regist');
	}
	//登録処理
	public function run_regist(){
		$this->loadModel('account_tbs');

		$where = array(
			'conditions' => array('id' => $this->request->data['regist_id'])
		);

	}
	//削除処理
	public function run_delete(){

	}
	//登録画面からaccount一覧へ戻る処理
	public function return_account(){

	}
	//ログアウト処理
	public function run_logout(){

	}

}