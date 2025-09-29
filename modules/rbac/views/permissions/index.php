<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
use modules\rbac\Module;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::translate('module', 'Role Based Access Control');
$this->params['breadcrumbs'][] = ['label' => Module::translate('module', 'RBAC'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = Module::translate('module', 'Permissions');
?>

<div class="rbac-permissions-index">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Module::translate('module', 'Permissions') ?></h3>

            <div class="box-tools float-end"></div>
        </div>
        <div class="box-body">
            <div class="float-start">
                <?= common\widgets\PageSize::widget([
                    'label' => '',
                    'defaultPageSize' => 25,
                    'sizes' => [5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 50 => 50, 100 => 100, 200 => 200],
                    'options' => [
                        'class' => 'form-control'
                    ]
                ]) ?>
            </div>
            <div class="float-end">
                <p>
                    <?= Html::a('<span class="fa fa-plus"></span> ', ['create'], [
                        'class' => 'btn w-100 btn-success',
                        'title' => Module::translate('module', 'Create Permission'),
                        'data' => [
                            'toggle' => 'tooltip',
                            'placement' => 'left'
                        ]
                    ]) ?>
                </p>
            </div>
            <?= $this->renderFile(
                '@modules/rbac/views/common/_gridView.php',
                [
                    'id' => 'grid-rbac-permissions',
                    'dataProvider' => $dataProvider
                ]
            ) ?>
        </div>
        <div class="box-footer">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'registerLinkTags' => true,
                'options' => [
                    'class' => 'pagination pagination-sm no-margin float-end',
                ]
            ]) ?>
        </div>
    </div>
</div>
