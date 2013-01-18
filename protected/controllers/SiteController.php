<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            $access_token = 'AAAG7lbaXRnwBADKlFjbuFd5yOrQ6AZB9ujIZBZBv0SWvkFP0ZAL9ZAFazXeitmlkbMkgCeSa6BY2A8Jf9E8DlBjUI46itubmgBWeTvMRPswmhztl9EeWN';            
            $posts = $this->getPosts($access_token);		
            $this->render('index',array(
                'events'=>array(),
                'news'=>array(),
                'posts'=>$posts,
                ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        private function getPosts($access_token)
        {
            $posts = array();
            //$graph_url = "https://graph.facebook.com/nyu.shalhevet/posts?limit=3&access_token=".$access_token;
            $graph_url = "https://graph.facebook.com/nyu.shalhevet/feed?access_token=".$access_token;
            $page_feed = json_decode(file_get_contents($graph_url), true);
            $page_posts = $page_feed['data'];
            if($page_posts){
            foreach($page_posts as $i=>$post){
                if(isset($post['message']) && $post['from']['id']==100001615483216)
                    array_push($posts, $post);
            }
            while(sizeof($posts)<5){
                $graph_url = $page_feed['paging']['next'];
                $page_feed = json_decode(file_get_contents($graph_url), true);
                $page_more_posts = $page_feed['data'];
                foreach($page_more_posts as $post){
                    if(isset($post['message']) && ($post['from']['id']==100001615483216))
                        array_push($posts,$post);
                    if(sizeof($posts)==5) break;
                }
            }
            }
            return $posts;
        }
}