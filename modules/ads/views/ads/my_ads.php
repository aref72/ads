<?php
$this->title = "تبلیغ های من";
use app\components\Card;
use app\components\SwingModal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
?>
<div class="row">
<?php foreach ($adsModel as $ads):?>
    <div class="col-lg-4 col-md-3">
    <?php  ?>
    <?= Card::widget([
        'ads' => $ads,
        'buttons' => [
            'update' => function($widget)use($ads){
                return Html::a('<i class="fa fa-edit"></i>', Url::to(['update', 'aid' => $ads->id]), [
                    'onclick' => "showModal(this); return false;",
                ]);
            },
            'view' => function($widget)use($ads){
                return Html::a('<i class="fa fa-eye"></i>', Url::to(['view-myads', 'aid' => $ads->id]));
            }
        ]
    ]); ?>
    </div>
<?php endforeach; ?>
    
</div>
<?php 
SwingModal::begin([
        'title' => 'ویرایش تبلیغ'
]);
Pjax::begin(['id' => 'ads-pjax']);
    $js ="
    function showModal(obj)
    {
        var url = $(obj).attr('href');
        $.ajax({
            url:url
        })
        .done(function(data){
            $('#ads-pjax').html(data);
            SwingModal('show');
        });

        return false;
    }
        ";
    $this->registerJs($js, \yii\web\View::POS_END);
Pjax::end();    
SwingModal::end();
?>

