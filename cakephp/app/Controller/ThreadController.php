<?php

APP::uses('AppController', 'Controller');

class ThreadController extends AccountController{
	// 各ページの表示
	// スレッド一覧取得処理
	// 削除処理
	// スレッド登録処理

	//thread一覧ページ
	public function thread(){
		//DBからスレッド取得
		$this->loadModel('thread');

		$res = $this->threads_tbs->find('all');
		$this->set('threads', $res);  //$thredsにスレッド一覧を格納

		//thread.ctp表示
		$this->render('thread');
	}

	//thread_registページ
	public function thread_regist(){
		//thread_regist.ctp表示
		$this->render('thread_regist');
	}

	//スレッド削除処理
	public function run_thread_delete(){

		$this->loadModel('users');

		$delete_date = $this->request->data;

		//DELETE
		//account_idが投稿者と一致した場合のみのif文
		$this->users->deleteAll(array('id' => $delete_date['delete_id']));

		// 削除後threadにリダイレクト
		$this->redirect('thread');
	}

	//スレッド登録処理
	public function run_thread_regist(){

		$this->loadModel('thread');

		//登録フォームのPOSTデータ取得
		$insert_data = $this->request->data;

		//INSERT
		$this->users->set(
				array(
					'title' => $insert_data['regist_thread_title'],
					'pass' => $insert_data['regist_thread_text'],
					'date' => date('Y-m-d H:i:s')]
					'account_id' => $insert_data['account_id']
					)
		);
		$this->users->save();

		// 登録後threadにリダイレクト
		$this->redirect('thread');
	}
}

 ?>
