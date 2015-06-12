<?php

APP::uses('AppController', 'Controller');

class TestController extends AppController{
	public function index(){

		$this->loadModel('SampleTb','sample');
		//insert
		/*
			$this->SampleTb->set(
					array(
							'name' => 'test3',
							'value' => 1234,
							'date' => date('Y-m-d H:i:s')
						)
				);
			$this->SampleTb->save();
		*/
		//insert end
		//select
		/*
			$res = $this->SampleTb->find('all');

			$this->set('users',$res);
		*/
		//select end
		//update
			//	$this->SampleTb->save(array('id' => 3, 'value' => 1111));
			//or
			/*
			$this->SampleTb->id =3;
			$this->SampleTb->save(array('value' => 1111))
			*/
			//or

		//select end

		//delete
		//	$this->SampleTb->delete(oid)
	}

	public function regist(){
		
		$this->loadModel('SampleTb','sample');
		$res = $this->request->data;
		var_dump($res);

			$this->SampleTb->set(
					array(
							'name' => $res['input_name'],
							'value' => $res['input_value'],
							'date' => date('Y-m-d H:i:s')
						)
				);
			$this->SampleTb->save();


		return $this->redirect(array('controller' => 'test', 'action' => 'index'));
	}
}