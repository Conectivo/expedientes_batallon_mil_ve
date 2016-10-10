<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

// Fuente: http://stackoverflow.com/questions/38027879/yii2-captcha-refresh-button

?>
<div class="row">
    <div class="col-lg-3">{image} <br /><a id="contactform-refresh-captcha" href="javascript:;" title="Recargar Código de verificación">Recargar</a></div>
    <div class="col-lg-6">{input}</div>
</div>
<?php $this->registerJs("
    $('#contactform-refresh-captcha').on('click', function(e){
        e.preventDefault();

        $('#contactform-verifycode-image').yiiCaptcha('refresh');
    })
"); ?>