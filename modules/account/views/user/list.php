<?php
$this->title='لیست کاربران';
?>
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
?>
<?= Html::a('create', Url::to(['create']), [
    'class' => 'btn btn-success',
    'onclick' => 'showModal(this); return false;'
]) ?>
<?= yii\grid\GridView::widget([
    'filterModel' => $userSearchModel,
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
<?php Modal::begin([
    'id' => 'user-modal'
]); ?>
<?php Pjax::begin(['id' => 'user-pjax', 'enablePushState' => false, 'timeout' => false]); ?>
<?php $js = "
    function showModal(obj)
    {
        var url = $(obj).attr('href');
        $.ajax({
            url:url
        })
        .done(function(returnData){
           $('#user-pjax').html(returnData); 
           $('#user-modal').modal('show');
        });
        
        return false;
    }
    
    $('#user-pjax').on('pjax:success', function(){
        $('#user-modal').modal('hide');
//        $.pjax.reload({
//            container:'#user-pjax',
//            timeout: false,
//            push:false,
//        });
    });
    ";
$this->registerJs($js, \yii\web\View::POS_END);
?>
<?php Pjax::end(); ?>
<?php Modal::end(); ?>