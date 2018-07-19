<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\T1;


/**
 * Site controller
 */
class TestController extends Controller
{
    
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public $layout = false;
    public function actionIndex()
    {
        // echo "666666";
        // return $this->render('index');
        //查询所有
        // $tls=T1::find()->all();
        // foreach($tls as $tl){
        //     echo $tl->id.'_'.$tl->uname.'<br />';
        // }
        // echo '<pre />';
        // $tl_one=T1::findOne(2);
        // echo $tl_one->uname;die;
        $tmodel=new T1;
        $tmodel->uname='abc';
        $tmodel->pwd='1234';
        $rs=$tmodel->save();
        echo $tmodel->id;
        echo '<pre>';
        var_dump($rs);
    }

    public function actionAdd(){
        echo "55555";
    }
}
