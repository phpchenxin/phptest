<?php 
namespace frontend\controllers;
use Yii;
use yii\web\controller;
use frontend\models\Msg;
use yii\db\ActiveRecord;

class MsgController extends Controller{
	public $layout=false;
	public $enableCsrfValidation = false;
	public function actionIndex(){
		// var_dump(Yii::$app->request->post('start_time'));
		$msgs=Msg::find()->all();
		return $this->render('index',compact('msgs'));
		// if(Yii::$app->request->isPost){
		// 	$start_time=strtotime(Yii::$app->request->post('start_time'));
		// 	$stop_time=strtotime(Yii::$app->request->post('stop_time'));
		// 	// var_dump($start_time);
		// 	// var_dump($stop_time);
		// 	$msgs = Msg::find()->where(['and' , ['>' , 'created_at' , $start_time] , ['<' , 'created_at' , $stop_time]])
		// 						->all();
		// 	 // $msgs =Msg::find()
		//   //           ->andFilterWhere(['between','created_at',$start_time, $stop_time])
		//   //           ->all();
		//             // echo '<pre>';
		//     var_dump($msgs);
		//     if($msgs){
		// 	    return $this->render('index',compact('msgs'));
		//     }else{
		//     	return $this->redirect(['./msg']);
		//     }
		// }
		
	}
	public function actionAdd(){
		//判断提交方式
		if(Yii::$app->request->isPost){
			//接收数据
			$uname=Yii::$app->request->post('uname');
			$content=Yii::$app->request->post('content');
			// var_dump($uname);
			//插入数据
			$Msgmodel=new Msg;
			$Msgmodel->uname=$uname;
			$Msgmodel->content=$content;
			$Msgmodel->created_at=$Msgmodel->updated_at=time();
			$rs=$Msgmodel->save();
			//成功后的跳转
			return $this->redirect(['./msg']);
		}
	}

	public function actionSearch(){
		if(Yii::$app->request->isPost){
			$start_time=strtotime(Yii::$app->request->post('start_time'));
			$stop_time=strtotime(Yii::$app->request->post('stop_time'));
			if($start_time=$stop_time==''){
				echo "<script>alert('请选择时间');location.href='".\yii\helpers\Url::toRoute('msg/index')."'</script>";die;
			}
			// var_dump($start_time);
			// var_dump($stop_time);
			// $msgs = Msg::find()->where('>','created_at',$start_time)
			// 					->where('<','created_at',$stop_time)
			// 					->all();
			$condition=['and',"created_at>{$start_time}","created_at<{$stop_time}"];
			$msgs =Msg::find()
		            ->Where($condition)
		            ->all();
		    // echo '<pre>';
		    // var_dump($msgs);
		    if($msgs){
			    return $this->render('index',compact('msgs'));
		    }else{
		    	echo "<script>alert('查找不存在');location.href='".\yii\helpers\Url::toRoute('msg/index')."'</script>";
		    }
		}
		
	}
}