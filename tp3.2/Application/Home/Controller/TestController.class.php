<?php 
namespace Home\Controller;

use Think\Controller;

class TestController extends Controller{
	public function index(){
		// echo "12347890";
		$tbl = M('t2')->select();
		// var_dump($tbl);die;
		$this->assign('tbl',$tbl);
		$this->display('index');
	}
}