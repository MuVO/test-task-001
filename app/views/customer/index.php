<?php
/**
 * @var \yii\web\View $this
 * @var \yii\db\ActiveQuery $query
 */

use yii\bootstrap\Html;

$this->title = 'Список клиентов';

?>

<?= Html::tag('h1', $this->title,
    ['class' => 'page-header']) ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <?= \yii\grid\GridView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => $query,
            ]),
            'columns' => [
                ['class' => \yii\grid\SerialColumn::class],
                'email:email',
                [
                    'attribute' => 'full_name',
                    'content' => function (\app\models\Customer $customer) {
                        return Html::a($customer->full_name,
                            ['edit', 'id' => $customer->id]);
                    }
                ],
                'inn',
                'company_name',
            ],
        ]) ?>
    </div>
</div>
