<?php

APP::uses('AppController', 'Controller');

class ThreadResManageController extends AppController{

	//aggregation.ctpのshow
	public function aggregation(){

	}

	//集計処理
	public function run_aggregation(){

		//POSTデータ取得＆変数に保持
		$aggregation_data = $this->request->data;
		$this->set('aggregation_data', $aggregation_data);

		//スレッドの件数取得
		$this->loadModel('thread_tb');

		$where = array(
				'conditions' => array(
							'date BETWEEN ? AND ?' => array(
													$aggregation_data['aggregation_date_from'],
													$aggregation_data['aggregation_date_to']
													)
							)
				);
		$res = $this->thread_tb->find('count', $where);
		$this->set('number_of_thread',$res);

		// レスの件数取得
		$this->loadModel('response_tb');

		$res = $this->response_tb->find('count', $where);
		$this->set('number_of_response', $res);

		//aggregation.ctp描写
		$this->render('aggregation');
	}

	//manage.ctpのshow
	public function manage(){

		//GETデータ取得&変数に保持
		$aggregation_data = $this->request->query;
		$this->set('aggregation_data', $aggregation_data);

		//スレッド一覧取得
		$this->loadModel('thread_tb');

		$where = array(
				'conditions' => array(
							'date BETWEEN ? AND ?' => array(
													$aggregation_data['from'],
													$aggregation_data['to']
													)
							),
				'order' =>  'date ASC'
				);
		$res = $this->thread_tb->find('all', $where);
		$this->set('threads', $res);

		// スレッドのレス件数取得
		$this->loadModel('response_tb');


		// $where = array(
		// 		'conditions' => array(
		// 					'date BETWEEN ? AND ?' => array(
		// 											$aggregation_data['from'],
		// 											$aggregation_data['to']
		// 										)
		// 						),
		// 		'conditions' => array('thread_id' =>  )
		// 		);
		// $res = $this->response_tb->find('count',$where);
		// $this->set('number_of_response', $res);
	}

}

 ?>
