<?php

APP::uses('AppController', 'Controller');

class ResponseController extends AppController{
	public function index(){
		$this->render('response');
	}
};