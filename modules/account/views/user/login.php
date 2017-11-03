<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\ImageSlider;
use yii\captcha\Captcha;

$this->title = 'ورود';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" style="margin-top:30px;">
<div class="col-lg-4 col-md-4 col-sm-6 col-lg-offset-4 col-md-offset-4 col-sm-offset-3">
<div class="panel panel-default" style="border:0px;border-radius:10px;">
    <div class="panel-heading" style="padding:0px;border-radius:10px;">
    <?= ImageSlider::widget([
            'nextPerv' => false,
            'indicators' => false,
            'height' => '170px',
            'classes' => 'img-rounded',
            'images' => [
                [
                    'active' => true,
                    'src' => 'image/a.jpg',
                    'title' => 'image',
                    
                ],
                [
                    'src' => 'image/b.jpg',
                    'title' => 'image',
                ]
            ],
    ]);?>
    </div>
    <div class="panel-body">
    <hr/>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "<div class=\"col-md-12\">{label}</div>\n<div class=\"col-lg-8 col-md-8 col-sm-offset-2 col-sm-8\">{input}</div>\n<div class=\"col-lg-8 col-md-8 col-lg-offset-1 col-md-offset-1\">{error}</div>",
        ],
    ]); ?>
        <?= $form->field($model, 'username')->textInput(['placeholder' => 'نام کاربری'])->label('') ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'گذر واژه'])->label('') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-8 col-md-offset-1 col-md-8 col-sm-8 col-xs-8\">{input} {label}</div>\n<div class=\"col-lg-12 col-md-12\">{error}</div>",
        ])?>
        <?php
var_dump($model->countLogin );
          if($model->countLogin > 3){
                echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                  'captchaAction' => '/account/user/captcha',  
                ])->label('');
        }?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-10">
                <?= Html::submitButton('ورود', ['class' => 'btn btn-primary', 'name' => 'login-button', 'id' => 'btn-ani']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
</div>