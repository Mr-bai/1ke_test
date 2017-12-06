<?php 
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\User;


class UserController extends Controller{
	public function actionIndex(){
		return $this->render('index');
	}

	public function actionAdd(){
		$data = Yii::$app->request->post();
		$user = new User;
		$user->name = $data['name'];
		$user->sxe = $data['sxe'];
		$data = $user->save();
		if($data){
			echo "<script>alert('添加成功')</script>";
			$this->redirect('index.php?r=user/lists');
		}else{
			echo "添加失败";
		}
	}

	public function actionLists(){
		$user = new User;
		$data = $user->find()->asArray()->all();
		return $this->render('lists',['arr'=>$data]);
	}


	public function actionDel(){
		$id = Yii::$app->request->get('id');
		$data = User::deleteAll("id=$id");
		$this->redirect('index.php?r=user/lists');
	}
	public function actionSave(){
		$id = Yii::$app->request->get('id');
		$arr =  User::find()->where("id=$id")->one();
		return $this->render('save',['arr'=>$arr]);
	}

	public function actionUpd(){  
	    $id = Yii::$app->request->post('id');
	    $name = Yii::$app->request->post('name');
	    $sxe = Yii::$app->request->post('sxe');
	    $db = User::find()->where("id=$id")->one();  
	    $db ->name=$name;  
	    $db ->sxe=$sxe;  
	    $db->save();
		$this->redirect('index.php?r=user/lists');
	}  
}
?>