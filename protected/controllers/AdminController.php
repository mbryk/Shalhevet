<?php

class AdminController extends Controller
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
            Yii::app()->user->logout();
            $loginUrl = 'https://graph.facebook.com/oauth/authorize?type=web_server&client_id=487726664599164&redirect_uri=http%3A%2F%2Fshalhevet.markbryk.in%2Fadmin%2Fcheck&scope=user_events,read_stream,offline_access&response_type=token';
            $this->redirect($loginUrl);
	}

        public function actionCheck($code)
	{
            $token_url = "https://graph.facebook.com/oauth/access_token?client_id=487726664599164&redirect_uri=http%3A%2F%2Fshalhevet.markbryk.in%2Fadmin%2Fcheck&client_secret=cedf227ff169420e5de9097807fa6056&code=".$code;
            $token=file_get_contents($token_url); //Fetching the token from the URL
            $graph_url = "https://graph.facebook.com/me?".$token;
            $page = json_decode(file_get_contents($graph_url), true);
            if(isset($page['id'])){
                if($page['id']=='1199884110' || $page['id']=='100001615483216'){
                    $model = new LoginForm;
                    $model->username = 'admin';
                    $model->password = 'admin';
                    if($model->validate() && $model->login()){
                        $user = User::model()->findByPk(1);
                        $user->token = $token;
                        if($user->save())
                            $this->redirect(Yii::app()->user->returnUrl);
                        else echo 'Oops';
                    }
                    else echo 'Oops';
                }
                else echo 'Sorry bud. You\'re not the man I\'m looking for';
            }
            else echo 'Sorry bud. Couldn\'t connect to facebook';
	}
        
        public function actionUpdateEvents(){
            if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl);
            
            $token = User::model()->findByPk(1)->token;
            $graph_url = "https://graph.facebook.com/nyu.shalhevet/events?".$token;
            $page_feed = json_decode(file_get_contents($graph_url), true);
            $events = $page_feed['data'];
            if($events){
                foreach($events as $i=>$event){
                    if(Events::model()->findByAttributes(array(('event_id')=>$event['id']))) $found = 1;
                }
                array_reverse($events, true);
                while(($found == 0)){
                    if(!isset($page_feed['paging']['next'])) break;
                    $graph_url = $page_feed['paging']['next'];
                    $page_feed = json_decode(file_get_contents($graph_url), true);
                    $more_events = $page_feed['data'];
                    foreach($more_events as $event){
                        if(Events::model()->findByAttributes(array(('event_id')=>$event['id']))) $found = 1;
                        else array_push($events, $event);
                    }                    
                }
                
                $count = 0;
                foreach($events as $event){
                if(!Events::model()->findByAttributes(array(('event_id')=>$event['id']))){
                    $newEvent = new Events;
                    $newEvent->event_id = $event['id'];
                    $newEvent->name = $event['name'];
                    $newEvent->location = $event['location'];
                    $newEvent->start_time = $event['start_time'];
                    $newEvent->end_time = $event['end_time'];
                    $newEvent->save();
                    $count ++;
                }
            }
            switch($count):
                case 0:
                    $message = 'No Events Added. Calendar is up to date';
                    break;
                case 1:
                    $message = '1 Event Added!';
                    break;
                default:
                    $message = $count.' Events Added!';
                    break;
            endswitch;
            Yii::app()->user->setFlash('success', $message);
            $this->redirect(Yii::app()->homeUrl);                
                
            }
        }
        
        public function actionUpdateFeed(){
            if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl);
            
            $posts = array();
            $token = User::model()->findByPk(1)->token;
            $graph_url = "https://graph.facebook.com/nyu.shalhevet/feed?".$token;
            $page_feed = json_decode(file_get_contents($graph_url), true);
            $page_posts = $page_feed['data'];
            if($page_posts){
            foreach($page_posts as $i=>$post){
                if(isset($post['message']) && $post['from']['id']==100001615483216)
                    array_push($posts, $post);
            }
            while(sizeof($posts)<6){
                if(!isset($page_feed['paging']['next'])) break;
                $graph_url = $page_feed['paging']['next'];
                $page_feed = json_decode(file_get_contents($graph_url), true);
                $page_more_posts = $page_feed['data'];
                foreach($page_more_posts as $post){
                    if(isset($post['message']) && ($post['from']['id']==100001615483216))
                        array_push($posts,$post);
                    if(sizeof($posts)==6) break;
                }
            }
            }
            $posts = array_reverse($posts,true);
            $count = 0;
            foreach($posts as $post){
                if(!Posts::model()->findByAttributes(array(('post_id')=>$post['id']))){
                    $newPost = new Posts;
                    $newPost->post_id = $post['id'];
                    $newPost->link = $post['actions'][0]['link'];
                    $newPost->message = $post['message'];
                    $newPost->created_time = $post['created_time'];
                    $newPost->save();
                    $count ++;
                }
            }
            switch($count):
                case 0:
                    $message = 'No Posts Added. Feed is up to date';
                    break;
                case 1:
                    $message = '1 Post Added!';
                    break;
                default:
                    $message = $count.' Posts Added!';
                    break;
            endswitch;
            Yii::app()->user->setFlash('success', $message);
            $this->redirect(Yii::app()->homeUrl);
        }
        
        public function actionNewNews(){
            $item = new News();
            if(isset($_POST['News'])){
                $item->attributes = $_POST['News'];
                if($item->save()){
                    Yii::app()->user->setFlash('success', "New News Item Added!");
                    $this->redirect(Yii::app()->homeUrl);
                }
            }
            $this->render('newNews', array('model'=>$item));
        }
        
        public function actionView(){
            
            $view = 'news';
            if (isset($_GET['view']))
                $view = $_GET['view'];
            
            switch($view):
                case 'news':
                    $model = new News('search');
                    $model->unsetAttributes(); 
                    if(isset($_GET['News'])){
                        $model->attributes=$_GET['News'];
                    }
                    $dataProvider = new CActiveDataProvider('News', array(
                        'sort'=>array('defaultOrder'=>'id ASC')
                    ));
                    break;
                case 'events':
                    break;
                default:
                    $model = new Posts('search');
                    $model->unsetAttributes(); 
                    if(isset($_GET['Posts'])){
                        $model->attributes=$_GET['Posts'];
                    }
                    $dataProvider = new CActiveDataProvider('Posts', array(
                        'sort'=>array('defaultOrder'=>'id ASC')
                    ));
                    break;
            endswitch;
                
            $this->render('view',array('model'=>$model, 'view'=>$view,'dataProvider'=>$dataProvider));
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$model)
	{
            switch($model):
                case 'news':
                    $item = News::model()->findByPk($id);
                    break;
                case 'events':
                    break;
                case 'posts':
                    $item = Posts::model()->findByPk($id);
                    break;
            endswitch;

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id,$model)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			switch($model):
                            case 'news':
                                $item = News::model()->findByPk($id);
                                break;
                            case 'events':
                                break;
                            case 'posts':
                                $item = Posts::model()->findByPk($id);
                                break;
                        endswitch;
                        $item->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('admin/view'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

}