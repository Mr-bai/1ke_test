<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\Zhou;
use app\models\Hobby;
use yii\data\Pagination;
use app\DB;

/**
 * Site controller
 */
class AdminController extends Controller
{
    public $enableCsrfValidation=false;

    public function actionRegister(){
        return $this->render('register');
    }

    public function actionRegister_2(){
        return $this->render('register_2');
    }

    public function actionAdd(){
        $data = Yii::$app->request->post();
        $model = new Zhou;
        $model->tel = $data['tel'];
        $model->password = $data['password'];
        $model->new_pwd = $data['new_pwd'];
        $res = $model->save();
        if($res){
            Yii::$app->session['tel'] = $model->tel;
            return $this->render('register_2');
        }
    }

    public function actionUpd(){
        $id = 1;
        $data = Zhou::findone($id);
        //print_r($data);die;
        $res = Yii::$app->request->post();
        $data->nickname = $res['nickname'];
        $data->Birthday = $res['Birthday'];
        $data->address = $res['address'];
        $arr = $data->update();
        if($arr){
            $this->redirect('index.php?r=admin/reg');
        }
    }

    public function actionReg(){
        $data = Hobby::find()->asArray()->All();
        return $this->render('register_3',['arr'=>$data]);
    }

    public function actionSave(){
        $id = 1;
        $data = Zhou::findone($id);
        //print_r($data);die;
        $res = Yii::$app->request->get('hobby');
        //print_r($res);die;
        $data->hobby = $res;
        $arr = $data->update();
        if($arr){
            return $this->render('register');
        }
    }
}
