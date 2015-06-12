<?php

APP::uses('AppController', 'Controller');

class ThreadController extends AppController{
	// 各ページの表示
	// スレッド一覧取得処理
	// 削除処理
	// スレッド登録処理

	//GETを変数に保持


	//thread一覧ページ
	public function thread(){

		$insert_id = $this->request->query;
		$this->set('account_id',$insert_id['account_id']);

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
		//account_idが投稿者と一致した場合のみのif文
		$this->thread_tb->deleteAll(array('id' => $delete_date['delete_id']));

		// 削除後threadにリダイレクト
		$this->redirect('thread');
	}

	//スレッド登録処理
	public function run_thread_regist(){

		$this->loadModel('thread_tb');

		//登録フォームのPOSTデータ取得
		$insert_data = $this->request->data;

		//INSERT
		$this->thread_tb->set(
				array(
					'title' => $insert_data['regist_thread_title'],
					'pass' => $insert_data['regist_thread_text'],
					'date' => date('Y-m-d H:i:s'),
					'account_id' => $insert_data['account_id']
					)
		);
		$this->thread_tb->save();

		// 登録後threadにリダイレクト
		$this->redirect('thread');
	}


}

 ?>
