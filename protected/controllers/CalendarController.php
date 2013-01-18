<?php

class CalendarController extends Controller
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
            $this->render('index');
	}

        public function actionEvent($id)
	{
            Events::model()->findByPk($id);
            $this->render('event', array('event'=>$model));
	}
        
        public function actionUpdateEvents()
        {
            
        }
        public function actionUpdateFeed()
        {
            $posts = array();

            $graph_url = "https://graph.facebook.com/nyu.shalhevet/feed?access_token=".Yii::app()->user->atoken;
            $page_feed = json_decode(file_get_contents($graph_url), true);
            $page_posts = $page_feed['data'];
            if($page_posts){
            foreach($page_posts as $i=>$post){
                if(isset($post['message']) && $post['from']['id']==100001615483216)
                    array_push($posts, $post);
            }
            while(sizeof($posts)<6){
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
            var_dump($posts);
            foreach($posts as $post){
                if(!Posts::model()->findByAttributes(array(('post_id')=>$post['id']))){
                    $newPost = new Posts;
                    $newPost->post_id = $post['id'];
                    $newPost->link = $post['actions'][0]['link'];
                    $newPost->message = $post['message'];
                    $newPost->created_time = $post['created_time'];
                    $newPost->save();
                }
            }
        }
}