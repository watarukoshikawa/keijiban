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
				$this->render('account_master_switch');
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
		if(count($this->account_tbs->find('first', $where))){
			$this->set('msg',"すでに使われているIDです");
			$this->show_regist();
		}else{
			$regist_data = array(
							'id' => $this->request->data['regist_id'],
							'name' => $this->request->data['regist_name'],
							'pass' => $this->request->data['regist_pass']
							);
			$this->account_tbs->set($regist_data);
			$this->account_tbs->save();
			$this->set('msg',"登録しました");
			$this->show_account();
		}

	}
	//削除処理
	public function run_delete(){
	
		$where = array('id' => (int)$this->request->data['delete_id']);
		$this->loadModel('account_tbs');
		$this->account_tbs->deleteAll($where);

		$where = array('account_id' => (int)$this->request->data['delete_id']);
		$this->loadModel('thread_tbs');
		$this->thread_tbs->deleteAll($where);

		$this->loadModel('response_tbs');
		$this->response_tbs->deleteAll($where);

		$this->set('msg',"ID:". $this->request->data['delete_id'] . "を削除しました");
		$this->show_account();

	}
	//登録画面からaccount一覧へ戻る処理
	public function return_account(){
		$this->show_account();

	}
	//ログアウト処理
	public function run_logout(){

		CakeSession::delete('account_id');
		CakeSession::delete('account_name');
		$this->show_main();
	}

}