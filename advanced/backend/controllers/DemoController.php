<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\Filed;
use yii\data\Pagination;

/**
 * Site controller
 */
class DemoController extends Controller
{
    public $enableCsrfValidation=false;

    public function actionAdd(){
        return $this->render('add');
    }

    public function actionIndex(){
        $data = Yii::$app->request->post();
        $data['filed_length'] = implode('~',$data['filed_length']);
        $model = new Filed;
        $model->filed_name = $data['filed_name'];
        $model->filed_num = $data['filed_num'];
        $model->filed_type = $data['filed_type'];
        $model->filed_xuan = $data['filed_xuan'];
        $model->filed_bi = $data['filed_bi'];
        $model->filed_gui = $data['filed_gui'];
        $model->filed_length = $data['filed_length'];
        $res = $model->save();
        if($res){
            echo "<script>alert('添加成功')</script>";
            $this->redirect('index.php?r=demo/show');
        }else{
            echo "<script>alert('添加失败')</script>";
            return $this->render('add');
        }
    }

    public function actionDel(){
        $id = Yii::$app->request->get('id');
        $data = Filed::deleteAll("id=$id");
        $this->redirect('index.php?r=demo/show');
    }

    public function actionFind(){
        $id = Yii::$app->request->get('id');
        $data = Filed::find()->where("id=$id")->asArray()->one();
        $filed_length = explode('~',$data['filed_length']);
        $data['small'] = $filed_length[0];
        $data['max'] = $filed_length[1];
        return $this->render('upd',['data'=>$data]);
    }

    public function actionSave(){
        $data = Yii::$app->request->post();
        $id = $data['id'];
        $data['filed_length'] = implode('~',$data['filed_length']);
        //print_r($data);die;
        $db = Filed::findone($id);
        //print_r($db);die;
        $db->filed_name = $data['filed_name'];
        $db->filed_num = $data['filed_num'];
        $db->filed_type = $data['filed_type'];
        $db->filed_xuan = $data['filed_xuan'];
        $db->filed_bi = $data['filed_bi'];
        $db->filed_gui = $data['filed_gui'];
        $db->filed_length = $data['filed_length'];
        $res = $db->update();
        if($res){
            echo "<script>alert('修改成功')</script>";
            $this->redirect('index.php?r=demo/show');
        }else{
            echo "<script>alert('修改失败')</script>";
        }
    }

    public function actionShow()
    {
        $query = Filed::find();

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()->all();
        return $this->render('index', [
            'data' => $countries,
            'pagination' => $pagination,
        ]);
    }

}
