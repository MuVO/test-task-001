<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\Customer $customer
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = $customer->isNewRecord ? 'Создание абонента' : 'Редактирование абонента';
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= Html::tag('h3', $this->title,
                    ['class' => 'panel-title']) ?>
            </div>
            <?php $form = ActiveForm::begin() ?>
            <div class="panel-body">
                <?= $form->field($customer, 'type')
                    ->radioList([
                        \app\models\Customer::SCENARIO_DEFAULT => 'Физ.лицо',
                        \app\models\Customer::SCENARIO_ENTREPRENEUR => 'ИП',
                        \app\models\Customer::SCENARIO_COMPANY => 'Юр.лицо',
                    ]) ?>
                <?= $form->field($customer, 'email') ?>
                <?= $form->field($customer, 'full_name') ?>
                <?= $form->field($customer, 'inn') ?>
                <?= $form->field($customer, 'company_name') ?>
            </div>
            <div class="panel-footer">
                <?= Html::submitButton('Сохранить',
                    ['class' => ['btn', 'btn-primary', 'btn-lg']]) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
