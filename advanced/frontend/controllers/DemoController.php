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
use app\models\Login;
use app\models\Mess;
use yii\data\Pagination;
use DfaFilter\SensitiveHelper;



class DemoController extends Controller{
	public function actionAdmin(){
		return $this->render('admin');
	}

	public function actionLogin(){
		$name = Yii::$app->request->post('name');
		$password = Yii::$app->request->post('password');
		$data = Login::find()->where("name = '".$name."' and password = '".$password."'")->one();
		if($data){
			echo "<script>alert('登陆成功')</script>";
			Yii::$app->session['id'] = $data->id;
			return $this->render('index');
		}else{
			echo "<script>alert('登陆失败')</script>";
			$this->redirect('login');
		}
	}

	public function actionAdd(){
		$data = Yii::$app->request->post();
		$user = new Mess;
		$user->id =  Yii::$app->session->get('id');;
		$user->massage = $data['massage'];
		$user->content = $data['content'];
		//print_r($user->content);die;
		$wordData = array(
		    '察象蚂',
		    '拆迁灭',
		    '车牌隐',
		    '成人电',
		    '成人卡通',
		    '杨春帅',
		    '大春'
		);
		$user['massage'] = SensitiveHelper::init()->setTree($wordData)->replace($user->massage,'***');
		$user['content'] = SensitiveHelper::init()->setTree($wordData)->replace($user->content,'***');
		$data = $user->save();
		if($data){
			echo "<script>alert('添加成功')</script>";
			$this->redirect('index.php?r=demo/cont');
		}else{
			echo "添加失败";
		}
	}

	public function actionDel(){
		$id = Yii::$app->request->get('u_id');
		$data = Mess::deleteAll("u_id=$id");
		$this->redirect('index.php?r=demo/cont');
	}
	public function actionSave(){
		$id = Yii::$app->request->get('u_id');
		$arr =  Mess::find()->where("u_id=$id")->one();
		return $this->render('save',['arr'=>$arr]);
	}

	public function actionUpd(){  
	    $id = Yii::$app->request->post('u_id');
	    $massage = Yii::$app->request->post('massage');
	    $content = Yii::$app->request->post('content');
	    $db = Mess::find()->where("u_id=$id")->one();  
	    $db ->massage=$massage;  
	    $db ->content=$content;  
	    $db->save();
		$this->redirect('index.php?r=demo/cont');
	}

	public function actionCont()
    {
        $query = Mess::find()->select('*')->innerJoin('login','mess.id=login.id');

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()->all();
        return $this->render('lists', [
            'data' => $countries,
            'pagination' => $pagination,
        ]);
    }

}
?>