<?php

APP::uses('AppController', 'Controller');

class ResponseController extends AppController{
	//レス一覧、表示
	public function show_main(){
		$this->loadModel('Response_tb');
		$get_id = $this->params['url'];
<<<<<<< HEAD
=======
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
>>>>>>> response 初の画面表示データ取得から表示まで

		$check_account = array(
							"name" => CakeSession::read('account_name'),
							"id" => CakeSession::read('account_id')
						);
		$check_input = array(
							"thread_id" => $get_id['thread_id'],
							"account_id" => CakeSession::read('account_id')
						);

		$sql = "
				SELECT
					thread_tbs.id,
					thread_tbs.title,
					thread_tbs.text AS thread_text,
					response_tbs.id AS response_id,
					response_tbs.text AS response_text,
					response_tbs.date,
					account_tbs.name,
					account_tbs.id AS account_id
				FROM
					thread_tbs
				LEFT JOIN
					response_tbs
				ON
					thread_tbs.id = response_tbs.thread_id
				LEFT JOIN
					account_tbs
				ON
					account_tbs.id = response_tbs.account_id
				WHERE
					thread_tbs.id = " . $get_id['thread_id'] . "
				ORDER BY
					response_tbs.date
				ASC

				";
		$return = $this->Response_tb->query($sql);
		$this->set("table_data", $return);
		$this->set("account", $check_account);
		$this->set("check_input", $check_input);
		$this->render('response');
	}
	//投稿画面、表示
	public function show_input(){
		$this->set("check_input",$this->request->data);
		$this->render('response_input');
	}
	//投稿画面、投稿
	public function run_input(){
		$this->loadModel('Response_tb');
		$where = $this->request->data;
		$arr = array(
					'text' => $where['input_response'],
					'date' => date('Y-m-d H:i:s'),
					'account_id' => (int)$where['account_id'],
					'thread_id' => (int)$where['thread_id']
				);
		var_dump($arr);
		$this->Response_tb->set($arr);
		$this->Response_tb->save();
		$this->redirect('show_main?thread_id='.$where['thread_id'].'');

	}
	//一覧画面、スレに戻る
	public function return_thread(){
		$this->redirect('../thread/thread');
	}
	//一覧画面、削除
	public function run_dalete(){
		$this->loadModel('Response_tb');
		$where = $this->request->data;
		$this->Response_tb->delete($where['response_id']);
		$this->redirect('show_main?thread_id='.$where['thread_id'].'');

	}
	//レス投稿画面、レス一覧に戻る
	public function return_response(){
		$this->loadModel('Response_tb');
		$this->redirect("show_main?thread_id=". $this->request->data['thread_id']);
	}
};
