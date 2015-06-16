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

		$this->loadModel('thread_tb');
		$this->loadModel('response_tb');

		$sql = "SELECT
					thread_tbs.date,
					thread_tbs.title,
					res_tb.thread_id,
					res_tb.res_count
				FROM
					thread_tbs
				LEFT JOIN
					(SELECT
					    COUNT(response_tbs.thread_id) AS res_count,
				        response_tbs.thread_id AS thread_id
			        FROM
			            response_tbs
					WHERE
						response_tbs.date
						BETWEEN '".$aggregation_data['from']."' AND '".$aggregation_data['to']."'
			        GROUP BY
			            thread_id
					)
					AS res_tb
				ON
					thread_tbs.id = res_tb.thread_id
				WHERE
					thread_tbs.date
					BETWEEN '".$aggregation_data['from']."' AND '".$aggregation_data['to']."'
				ORDER BY
					thread_tbs.date
				ASC
				";

		$res = $this->thread_tb->query($sql);
		$this->set('threads', $res);
	}

}

 ?>
