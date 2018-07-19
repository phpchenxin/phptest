<?php 
namespace Home\Controller;

use Think\Controller;

class MsgController extends Controller{
	public function index(){
		$msgs=M('msg')->select();
		$this->assign('msgs',$msgs);
		$this->display('index');
	}

	public function add(){
		if(IS_POST){
			$postData['uname']=I('post.uname');
			$postData['content']=I('post.content');
			$postData['created_at']=$postData['updated_at']=time();
			$rs=M('msg')->add($postData);
			if($rs){
				$this->success('添加成功',U('home/msg/index'));
			}else{
				$this->error('添加失败',U('home/msg/index'));
			}
		}
	}
}