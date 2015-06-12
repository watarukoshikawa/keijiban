<?php

APP::uses('AppController', 'Controller');

class ResponseController extends AppController{
	//レス一覧、表示
	public function show_main(){
		$this->loadModel('Response_tb');
		$get_id = $this->params['url'];
		var_dump($get_id);
		$sql = "	
					SELECT 
						account_tbs.name ,
						get_thread.response_id ,
						get_thread.response_text ,
						get_thread.response_date ,
						get_thread.account_id ,
						get_thread.thread_title ,
						get_thread.thread_text
					FROM 
						`account_tbs` 
					INNER JOIN 
						(SELECT 
							response_tbs.id AS response_id ,
							response_tbs.text AS response_text ,
							response_tbs.date AS response_date ,
							response_tbs.account_id ,
							thread_tbs.title AS thread_title ,
							thread_tbs.text AS thread_text
						FROM `response_tbs` 
						INNER JOIN
							thread_tbs
						ON 
							thread_tbs.id = response_tbs.thread_id
						WHERE thread_id = ".$get_id['thread_id'].") AS get_thread 
					ON 
						get_thread.account_id = account_tbs.id
					ORDER BY response_date ASC
				";

		var_dump($sql);
		$return = $this->Response_tb->query($sql);
		$this->set("table_data", $return);
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