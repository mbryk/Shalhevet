<?php

class LoginController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex()
	{
            $loginUrl = 'https://graph.facebook.com/oauth/authorize?type=web_server&client_id=487726664599164&redirect_uri=http%3A%2F%2Fshalhevet.markbryk.in%2Flogin%2Fcheck&scope=user_events,read_stream,offline_access&response_type=token';
            $this->redirect($loginUrl);
	}

        public function actionCheck($code)
	{
            Yii::app()->user->logout();
            $token_url = "https://graph.facebook.com/oauth/access_token?client_id=487726664599164&redirect_uri=http%3A%2F%2Fshalhevet.markbryk.in%2Flogin%2Fcheck&client_secret=cedf227ff169420e5de9097807fa6056&code=".$code;
            $token=file_get_contents($token_url); //Fetching the token from the URL
            $graph_url = "https://graph.facebook.com/me?".$token;
            $page = json_decode(file_get_contents($graph_url), true);
            if(isset($page['id'])){
            if($page['id']=='1199884110' || $page['id']=='100001615483216'){
                $model = new LoginForm;
                $model->username = 'admin';
                $model->password = 'admin';
                if($model->validate() && $model->login()){
                    Yii::app()->user->setState('atoken',$token);
                    $this->redirect(Yii::app()->user->returnUrl);
                }
            }
            }
            echo 'Sorry bud. You\'re not the man I\'m looking for';
	}

}