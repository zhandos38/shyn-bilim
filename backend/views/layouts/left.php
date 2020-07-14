<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Разделы', 'options' => ['class' => 'header']],
                    ['label' => 'Пользователи', 'icon' => 'fas fa-user', 'url' => ['user/index']],
                    ['label' => 'Журналы', 'icon' => 'fas fa-user', 'url' => ['magazine/index']],
                    ['label' => 'Материалы', 'icon' => 'fas fa-user', 'url' => ['article/index']],
                    ['label' => 'Проекты', 'icon' => 'fas fa-user', 'url' => ['project/index']],
                    ['label' => 'Материалы Проектов', 'icon' => 'fas fa-user', 'url' => ['project-article/index']],
                    ['label' => 'Новости', 'icon' => 'fas fa-user', 'url' => ['news/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
