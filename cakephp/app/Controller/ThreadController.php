<?php

APP::uses('AppController', 'Controller');

class ThreadController extends AppController{
	// 各ページの表示
	// スレッド一覧取得処理
	// 削除処理
	// スレッド登録処理
	// セッションでページ管理


	//thread一覧ページ
	public function thread(){

		//セッション
		$account_name = CakeSession::read('account_name');
		$account_id = CakeSession::read('account_id');
		$this->set('account_name', $account_name);
		$this->set('account_id', $account_id);

		//DBからスレッド取得
		$this->loadModel('thread_tb');

		$res = $this->thread_tb->find('all');
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

		$this->loadModel('thread_tb');

		$delete_date = $this->request->data;

		//DELETE
		$this->thread_tb->deleteAll(array('id' => $delete_date['delete_id']));

		// 削除後threadにリダイレクト
		$this->redirect('thread');
	}

	//スレッド登録処理
	public function run_thread_regist(){

		$this->loadModel('thread_tb');

		//登録フォームのPOSTデータ取得
		$insert_data = $this->request->data;

		//登録しようとしているユーザーのセッションを取得
		$account_name = CakeSession::read('account_name');
		$account_id = CakeSession::read('account_id');

		//INSERT
		$this->thread_tb->set(
				array(
					'title' => $insert_data['regist_thread_title'],
					'text' => $insert_data['regist_thread_text'],
					'date' => date('Y-m-d H:i:s'),
					'account_id' => $account_id,
					'author_name' => $account_name
					)
		);
		$this->thread_tb->save();

		// 登録後threadにリダイレクト
		$this->redirect('thread');
	}


}

 ?>
