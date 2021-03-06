<?php

class MealController extends Controller
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
            $meal = new Meals; $person = new People();
            if(isset($_POST['Meals']))
            {
                $meal->attributes = $_POST['Meals'];
                $meal->notes = $_POST['Meals']['notes'];
                $meal->settings = Meals::model()->translateChoices($_POST['Meals']['choices']);
                $meal->date = Shabbat::model()->nextShabbat();
                if($meal->save())
                    $this->redirect(array('manage','meal'=>$meal->id));
            }
            $this->render('index', array('meal'=>$meal,'person'=>$person));
	}
        
        public function actionManage($meal = NULL)
        {
            $meal = Meals::model()->findByPk($meal);
            if(empty($meal)) $this->redirect(array('index'));
            $dataProvider=new CActiveDataProvider('Meals', array(
                'criteria'=>array(
                    'condition'=>'date=1', // =Shabbat::model()->nextShabbat()
                    'order'=>'id DESC',
                    ),
                ));
            $this->render('manage', array('meal'=>$meal,'dataProvider'=>$dataProvider));
        }
}