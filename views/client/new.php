<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    <h2 class="text-center" style="margin-bottom: 40px;">Добавление нового пользователя</h2>

<?php $form = ActiveForm::begin(); ?>
    <h3 class="text-center">Данные пользователя:</h3>
<?= $form->field($clientModel, 'login')->textInput() ?>
<?= $form->field($clientModel, 'password')->passwordInput() ?>
<?= $form->field($clientModel, 'name')->textInput() ?>
<?= $form->field($clientModel, 'lastName')->textInput() ?>
<?= $form->field($clientModel, 'gender')->dropDownList($clientModel->getGenderList()) ?>
<?= $form->field($clientModel, 'mail')->input('mail') ?>

    <h3 class="text-center">Данные адреса:</h3>
<?= $form->field($clientAddressModel, 'postcode')->textInput() ?>
<?= $form->field($clientAddressModel, 'countryCode')->textInput() ?>
<?= $form->field($clientAddressModel, 'cityName')->textInput() ?>
<?= $form->field($clientAddressModel, 'streetName')->textInput() ?>
<?= $form->field($clientAddressModel, 'houseNumber')->textInput() ?>
<?= $form->field($clientAddressModel, 'apartmentNumber')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить пользователя', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>