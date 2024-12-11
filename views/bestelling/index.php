<?php
use app\models\Menu;
use app\models\Bestelling;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
$medewerkerList = ArrayHelper::map($medewerkers, 'id', 'naam');
$menuList = ArrayHelper::map($menu, 'id', 'naam');


/** @var yii\web\View $this */
/** @var app\models\BestellingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bestellings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bestelling-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bestelling', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'medewerker_id',
                'label' => 'Medewerker',
                'filter' => $medewerkerList,
                'value' => function ($model) {
                    return $model->medewerkers->naam;
                },
            ],
            'naam',
            [
                'attribute' => 'menu_id',
                'label' => 'Menu',
                'filter' => $menuList,
                'value' => function ($model) {
                    return $model->menu->naam;
                },
            ],
            'status',
            //'timestamp',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bestelling $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
