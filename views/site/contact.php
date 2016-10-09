<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contactanos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Gracias por contactaremos. Nosotros le responderemos lo mas pronto posible.
        </div>

        <p>
            Tenga en cuenta que si activa el depurador Yii, usted debe ser capaz de ver 
            el mensaje de correo electrónico en el panel del depurador.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Debido a que la aplicación se encuentra en el modo de desarrollo, el correo
                electrónico no se envía, pero guarda como un fichero 
                <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Por favor configure la propiedad <code>useFileTransport</code> del componente 
                de aplicación <code>mail</code> a false para habilitar el envío real de email.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Atraves de tu mensaje puedes comunicarte con la prestigiosa Unidad 208 BALOG G/B "JUAN ANTONIO PAREDES" o ademas puedes encontrarnos a travez de nuestra ubicacion.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
