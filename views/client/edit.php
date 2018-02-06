<?php
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="text-center">Страница пользователя: <?= $clientModel->name ?></h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Поле</th>
                        <th>Значение</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Логин</th>
                        <td><?= $clientModel->login ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Имя</th>
                        <td><?= $clientModel->name ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Фамилия</th>
                        <td><?= $clientModel->lastName ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Пол</th>
                        <td><?= $clientModel->getGenderValue() ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Время создания</th>
                        <td><?= $clientModel->created_at ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Почта</th>
                        <td><?= $clientModel->mail ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <h3 class="text-center">Добавить новый адрес</h3>
                <?php $form = ActiveForm::begin(['action' => ['/address/new']]); ?>
                <?= $form->field($clientAddressModel, 'postcode')->textInput() ?>
                <?= $form->field($clientAddressModel, 'countryCode')->textInput() ?>
                <?= $form->field($clientAddressModel, 'cityName')->textInput() ?>
                <?= $form->field($clientAddressModel, 'streetName')->textInput() ?>
                <?= $form->field($clientAddressModel, 'houseNumber')->textInput() ?>
                <?= $form->field($clientAddressModel, 'apartmentNumber')->textInput() ?>
                <?= $form->field($clientAddressModel, 'client_id')->hiddenInput(['value' => $clientModel->getPrimaryKey()])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Добавить новый адрес', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <h3 class="text-center">Адреса:</h3>
            <?php foreach ($clientAddress as $address): ?>
                <?php $form = ActiveForm::begin(['action' => ['/address/edit']]); ?>
                <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Поле</th>
                            <th>Значение</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Почтовый индекс</th>
                            <td><?= $form->field($address, 'postcode')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Страна</th>
                            <td><?= $form->field($address, 'countryCode')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Название города</th>
                            <td><?= $form->field($address, 'cityName')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Название улицы</th>
                            <td><?= $form->field($address, 'streetName')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Номер дома</th>
                            <td><?= $form->field($address, 'houseNumber')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Номер офиса/квартиры</th>
                            <td><?= $form->field($address, 'apartmentNumber')->textInput()->label(false) ?></td>
                        </tr>
                        <?= $form->field($address, 'client_id')->hiddenInput(['value' => $clientModel->getPrimaryKey()])->label(false) ?>
                        <?= Html::hiddenInput('addressId', $address->getPrimaryKey()); ?>
                        </tbody>
                    </table>
                </div>
                <?= Html::submitButton('Обновить адрес', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>

                <?php $form = ActiveForm::begin(['action' => ['/address/delete'], 'options' => [
                    'style' => 'margin-top: 20px'
                ]]); ?>
                    <?= Html::hiddenInput('id', $address->getPrimaryKey()); ?>
                    <?= Html::hiddenInput('clientId', $clientModel->getPrimaryKey()); ?>
                    <?= Html::submitButton('Удалить адрес', ['class' => 'btn btn-danger']) ?>
                <?php ActiveForm::end(); ?>

                <div style="width: 100%; height: 2px; background: black; margin-top: 10px"></div>
            <?php endforeach; ?>
        </div>
    </div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>