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
            $events = Events::model()->since()->findAll();
            $js = '';
            foreach($events as $event){
                $js.= '{title: \''. addslashes($event->name).'\',start: new Date('.(strtotime($event->start_time) * 1000).'),';
                if($event->end_time !== NULL) $js.='end: new Date('.(strtotime($event->end_time) * 1000).'),';
                $js.= 'allDay:false,url: \'http://shalhevet.markbryk.in/calendar/event/'.$event->id.'\'},';
            }

            $this->render('index',array('events'=>$js));
	}

        public function actionEvent($id)
	{
            $model = Events::model()->findByPk($id);
            $this->render('event', array('model'=>$model));
	}        
}