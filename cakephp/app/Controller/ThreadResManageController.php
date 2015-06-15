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


		//aggregation.ctp描写
		$this->render('aggregation');
	}

	//manage.ctpのshow
	public function manage(){

	}

}

 ?>
