<table class="table">
    <thead>
        <tr>
            <th>Guest</th>
            <th>Year</th>
            <th>Cell</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Mark</td>
            <td>Sophomore</td>
            <td>516</td>
        </tr>
        <tr>
            <td>Bryk</td>
            <td>Junior</td>
            <td>516</td>
        </tr>
    </tbody>
</table>


<?php 
if($dataProvider->totalItemCount !== 0):
    $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'name', 'header'=>'Name'),
        array('name'=>'email', 'header'=>'Email'),
        array('name'=>'year', 'header'=>'Year'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
));endif; ?>