<?php

APP::uses('AppController', 'Controller');

class ThreadController extends AppController{
	// 各ページの表示
	// スレッド一覧取得処理
	// 削除処理
	// スレッド登録処理

	//thread一覧ページ
	public function thread(){
		//DBからスレッド取得
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
		// 削除後threadにリダイレクト
	}

	//スレッド登録処理
	public function run_thread_regist(){
		// 登録後threadにリダイレクト
	}
}

 ?>
