<?php
$this->title='ویرایش کاربر';
?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default animated bounceIn">
            <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> ویرایش کاربر</div>
            <div class="panel-body">
<?php
echo $this->render('_form',[
    'userModel'=>$userModel
])
?>
           </div>
        </div>
    </div>
</div>
