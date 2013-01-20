<h1 style="text-align: center"><a style="<?php if($view=='news') echo 'color:red'?>" href="/admin/view?view=news">News</a> / <a style="<?php if($view=='posts') echo 'color:red'?>" href="/admin/view?view=posts">Posts</a></h1>
<?php 
switch($view):
    case 'news':
        $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'title', 'header'=>'Title'),
        array('name'=>'content', 'header'=>'Content'),
        array('name'=>'date_created', 'header'=>'Date Created'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
            'template'=>'{delete}',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("update",array("model"=>"news","id"=>$data->primaryKey))',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("delete",array("model"=>"news","id"=>$data->primaryKey))'            
        ),
    ),
)); 
        break;
    default:
        $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'link', 'header'=>'Link'),
        array('name'=>'message', 'header'=>'Message'),
        array('name'=>'created_time', 'header'=>'Date Created'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
            'template'=>'{delete}',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("update",array("model"=>"posts","id"=>$data->primaryKey))',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("delete",array("model"=>"posts","id"=>$data->primaryKey))'
        ),
    ),
)); 
        break;
endswitch;
