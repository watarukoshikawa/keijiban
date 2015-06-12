<?php

APP::uses('AppController', 'Controller');

class ResponseController extends AppController{
	//レス一覧、表示
	public function show_main(){
		$this->render('response');
	}
	//投稿画面、表示
	public function show_input(){
		$this->render('response_input');
	}
	//投稿画面、投稿
	public function run_input(){

	}
	//一覧画面、スレに戻る
	public function return_thread(){

	}
	//一覧画面、削除
	public function run_dalete(){

	}
};