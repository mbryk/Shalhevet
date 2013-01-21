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
            $criteria = new CDbCriteria;
            $now = new CDbExpression("NOW()");
            $criteria->addCondition('start_time > '.$now); 
            $events = Events::model()->findAll($criteria);
            
            foreach($events as $event){
                $year = date('M j, ga', strtotime($n_item->date_created));
                $js.= '{title: \''. $event->name.'\',start: new Date('.;
            }

            //{title: 'Lunch',start: new Date(y, m, d, 12, 0),end: new Date(y, m, d, 14, 0),allDay: false},
            $this->render('index');
	}

        public function actionEvent($id)
	{
            Events::model()->findByPk($id);
            $this->render('event', array('event'=>$model));
	}        
}