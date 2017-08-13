<?php
$this->title='لیست کاربران';
?>
<?php
use yii\helpers\Html;
?>

<?= yii\grid\GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        'id',
        'username',
        'email',
        [
            'attribute'=>'status',
            'format' => 'raw',
            'value'=> function ($model){
                if($model->status==1)
                {
                    return '<span class="glyphicon glyphicon-ok"></span>';
                }
                return '<span class="glyphicon glyphicon-remove"></span>';
            }
        ],
    'created_at',
    'updated_at',

       [
           'class'=> '\yii\grid\ActionColumn'
       ]
    ]
]) 
?>
