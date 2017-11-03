<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\MainAsset;
use yii\helpers\Url;
use kartik\widgets\Growl;
//MainAsset::register($this);
/**
 * @var $this \yii\base\View
 * @var $content string
 */
//echo Yii::$app->controller->action->id;
//die();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo Html::encode($this->title); ?></title> 
    <?php $this->head(); ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <nav id="menu" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">وب کندو <i class="fa fa-link"></i></a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav navbar-right nav">
                    <?php if(Yii::$app->user->isGuest): ?>
                        <li><a href="<?= Url::to(['/account/login']) ?>"><i class="glyphicon glyphicon-log-in"></i> ورود</a></li>
                    <?php endif; ?>
                        
                    <?php if(!Yii::$app->user->isGuest): ?>
                        <li><a href="<?= Url::to(['site/logout']); ?>"><i class="glyphicon glyphicon-log-out"></i> خروج</a></li>
                    <?php endif; ?>
                        
                    
                    <?php if(!Yii::$app->user->isGuest): ?>
                    <li><a href="<?= Url::to(['/admin']) ?>"><i class="glyphicon glyphicon-dashboard"></i> ناحيه كاربري</a></li>
                    <?php endif; ?>
                    
                    <li><a href="<?= Url::to(['site/about']) ?>"><i class="glyphicon glyphicon-user"></i> درباره ما</a></li>
                    
                    <li><a href="<?= Url::to(['site/contact']) ?>"><i class="glyphicon glyphicon-earphone"></i> تماس باما</a></li>
                    
                     <?php if(Yii::$app->user->isGuest): ?>
                    <li><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/signup']) ?>"><i class="glyphicon glyphicon-registration-mark"></i> عضويت</a></li>
                    <?php endif; ?>
                    
                    <li><a href="<?= Yii::$app->homeUrl ?>"><i class="glyphicon glyphicon-home"></i> خانه</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row" id="header">
            <div class="col-lg-12 col-md-12">
                <div id="mycarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="" data-target="#mycarousel" data-slide-to="0"></li>
                        <li data-target="#mycarousel" data-slide-to="1" class="active"></li>
                        
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img alt="وب کندو" src="<?= $this->theme->baseUrl ?>/main/image/slider/slider1.png">                           
                        </div>       
                   
                        <div class="item">
                            <img alt="وب کندو" src="<?= $this->theme->baseUrl ?>/main/image/header.png">                            
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/end:row-->
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="text-center"><h3><i class="glyphicon glyphicon-home"></i> سیستم مدیریت محتوای دانشگاه ایوانکی </h3></div>
            </div>
            <div class="col-lg-4 col-md-4">
                <img alt="وب کندو" src="<?= $this->theme->baseUrl ?>/main/image/header_05.png">
                
            </div>
            
        </div>
        <div class="row" id="content">   

            <div class="col-lg-9 col-md-9">
            	<?= $content ?>
            </div>
            
            <div class="col-lg-3 col-md-3">
                <div class="sidebar">
                   
                </div>
                <div class="sidebar sidebar-white">
                    <div class="title">
                        <i class="fa fa-archive"></i>
                        دسته بندی
                        
                    </div>
                    <div class="sidebar-content">
                        <div id="categories"> 
                            <ul class="nav">
                                
                            </ul>
                        </div><!--/end:categories-->
                    </div>
                </div>
                
                <div class="sidebar sidebar-white">
                    <div class="title">
                        <i class="fa fa-link"></i> 
                        دوستان ما
                    </div>
                    <div class="sidebar-content">
                        <div id="links">
                            <ul class="nav">
                                <li><a href="#">گوگل</a></li>
                                <li><a href="#">وب کندو</a></li>
                                <li><a href="#">آریانا جی اس ام</a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="footer">
                    
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>
    <?php
    $js = "
        $(document).ready(function(){
            $('.sidebar').hide().slideToggle(1000);
            $('.listbox').hide().fadeIn(1500);
        });
        ";
    $this->registerJs($js, \yii\web\View::POS_END);
    ?>
</html>
<?php $this->endPage(); ?>

<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $value) {
    echo Growl::widget([
        'type' => Growl::TYPE_SUCCESS,
        'title' => ' '.$value,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'delay' => 0,
        'pluginOptions' => [
            'placement' => [
                'from' => 'bottom',
                'align' => 'left',
            ]
        ]
    ]);
}
?>