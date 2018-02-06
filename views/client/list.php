<?php
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

    <div class="container">
        <h2>Страница пользователей</h2>
        <ul class="list-group clearfix">
            <li class="list-group-item col-sm-2" style="background: #dff0d8">id</li>
            <li class="list-group-item col-sm-2" style="background: #dff0d8">Логин</li>
            <li class="list-group-item col-sm-2" style="background: #dff0d8">Имя</li>
            <li class="list-group-item col-sm-2" style="background: #dff0d8">Фамилия</li>
            <li class="list-group-item col-sm-2" style="background: #dff0d8">Почта</li>
            <li class="list-group-item col-sm-2" style="background: #dff0d8">Действия</li>
        </ul>
        <?php foreach ($clients as $client): ?>
            <ul class="list-group clearfix list-group-item-text">
                <li class="list-group-item col-sm-2"><?= $client->getPrimaryKey() ?></li>
                <li class="list-group-item col-sm-2"><?= $client->login ?></li>
                <li class="list-group-item col-sm-2"><?= $client->name ?></li>
                <li class="list-group-item col-sm-2"><?= $client->lastName ?></li>
                <li class="list-group-item col-sm-2"><?= $client->mail ?></li>
                <li class="list-group-item col-sm-2">
                    <?php $form = ActiveForm::begin(['action' => ['/client/delete']]); ?>
                    <button><span
                                class="glyphicon glyphicon-pencil"><?= Html::hiddenInput('id', $client->getPrimaryKey()); ?></span>
                    </button>
                    <?php ActiveForm::end(); ?>
                    <?php $form = ActiveForm::begin(['action' => ['/client/delete']]); ?>
                    <button><span
                                class="glyphicon glyphicon-remove-circle"><?= Html::hiddenInput('id', $client->getPrimaryKey()); ?></span>
                    </button>
                    <?php ActiveForm::end(); ?>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>