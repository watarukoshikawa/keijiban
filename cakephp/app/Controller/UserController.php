<?php

APP::uses('AppController', 'Controller');

class UserController extends AppController{
	/*
	フラグからどのcptを呼び出すか判別
	セッションを使う予定
	全ての関数から呼び出し
	フラグやレンダリングするctpを選択する予定
	長くなる（？）
	*/
	public function index(){
		$select_flg = $this->request->data;
		if(isset($this->request->data['select_btn'])){
			$this->loadModel('User','User');
			$where = $this->User->find('all',array('conditions'=>array('User.name LIKE ?'=> '%'.$this->request->data['select_name'].'%')));
			$this->set('table_data',$where);
		}else{
			$this->loadModel('User','User');
			$this->set('table_data', $this->User->find('all'));
			$this->render('index');
		}
	}
	/*
	ログインボタン押した時の判別
	true->ページ推移 index.ctp表示
	false->errmsgと共に元に戻る
	*/
	public function run_login(){

		$this->loadModel('User','User');

		$checker = $this->request->data;
		$finder = array('conditions' => array("id" => $checker['input_id'] , "pass" => $checker['input_pass']));
		//DBへのデータ照合により条件分岐

		if($this->User->find('count', $finder)){
			$this->index();
		}else{
			$this->set('msg',"ID,パスワードが一致しません");
			$this->show_login();
		}

	}
	/*
	各ページログアウトボタン押した時
	フラグを消去後ログイン画面へ
	*/
	public function run_logout(){
		//ログインのフラグを削除した上で
		$this->set('msg',"ログアウトしました");
		$this->show_login();

	}
	/*
	ログイン画面表示専用
	*/
	public function show_login(){
		$this->set('test',"test");
		$this->render('login');

	}
	/*
	新規登録画面表示用
	変更画面と同じregist.ctpなので判別必須
	*/
	public function show_insert_view(){
		$this->set('btn_value',"登録");
		$this->set('action','run_insert');
		$this->render('regist');

	}
	/*
	新規登録確認アラートがtrueの時
	insertを流してindex.ctpを呼び出し
	*/
	public function run_insert(){
		//true,falseの判別は入れ替えたい
		if(isset($this->request->data['regist_btn'])){
			//DB接続、内容確認、登録
			$res = $this->request->data;
			if($res['regist_name'] && $res['regist_value'] && $res['regist_pass']){
				$flg = true;

				$flg = strlen($res['regist_name']) <= 10 ? $flg : false ;

				$flg = strlen($res['regist_name']) <= 20 ? $flg : false;

				if($flg){
					$this->loadModel('User','User');
					$arr = array(
								'name' => $res['regist_name'],
								'value' => (int)$res['regist_value'],
								'pass' => $res['regist_pass'],
								'date' => date('Y-m-d H:i:s')
							);
					$this->User->set($arr);
					$this->User->save();
					$this->set('msg','登録が完了しました');
				}else{
					$this->set('msg','エラーが発生しました');
				}

			}else{
				$this->set('msg','空白があります');
			}
			$this->index();
		}else{

			$this->show_insert_view();
		}


	}
	/*
	変更画面表示用
	新規登録画面と同じregist.ctpなので判別必要
	*/
	public function show_update_view(){
		$where = $this->params['url']['id'];
		$this->loadModel('User','User');
		$this->set('update_data',$this->User->findById($where));
		$this->set('btn_value',"変更");
		$this->set('action','run_update');
		$this->render('regist');

	}
	/*
	変更確認アラートがtrueの時
	update後index.ctp表示
	*/
	public function run_update(){
		$this->loadModel('User','User');
		$res = $this->request->data;

		$where = array(
					'id' => $res['regist_id'],
					'name' => $res['regist_name'],
					'value' => (int)$res['regist_value'],
					'pass' => $res['regist_pass'],
					'date' => date('Y-m-d H:i:s')
				);
		$this->User->save($where);
		$this->set('msg',"id:".$res['regist_id']."を変更しました");
		$this->index();
	}
	/*
	削除ボタン押した時
	derete後index.ctp表示
	*/
	public function run_delete(){
		$this->loadModel('User','User');

		$where = $this->request->data['delete_id'];

		$this->User->delete($where);
		$this->set('msg','ID:'.$where.'を削除しました');
		$this->index();

	}
}