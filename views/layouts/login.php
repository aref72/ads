<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\LoginAsset;
use app\models\Category;
use yii\helpers\Url;
LoginAsset::register($this);
/**
 * @var $this \yii\base\View
 * @var $content string
 */
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo Html::encode($this->title); ?></title> 
    <?php $this->head(); ?>
</head>
<body style="background: url(<?= $this->theme->baseUrl ?>/main/image/backlogin.png) no-repeat; background-size: cover;">
    <?php $this->beginBody() ?>
    
    <div class="container">
        <?= $content ?>
    </div>
    <?php $this->endBody() ?>
</body>
    
</html>
<?php $this->endPage(); ?>