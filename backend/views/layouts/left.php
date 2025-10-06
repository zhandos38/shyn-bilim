<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name ?></p>
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
                    ['label' => 'Кітапхана-Категория', 'icon' => 'fas fa-user', 'url' => ['book-category/index']],
                    ['label' => 'Кітапхана', 'icon' => 'fas fa-user', 'url' => ['book/index']],
                    ['label' => 'Кітап оқу қатысушылар', 'icon' => 'fas fa-user', 'url' => ['book-assignment/index']],
                    ['label' => 'Подписка', 'icon' => 'fas fa-edit', 'url' => ['subscribe/index']],
                    ['label' => 'Материал Журнал', 'icon' => 'fas fa-user', 'url' => ['article-magazine/index']],
                    ['label' => 'Материал Журнал Предметы', 'icon' => 'fas fa-user', 'url' => ['article-magazine-subject/index']],
                    ['label' => 'Материал Журнал Выпуски', 'icon' => 'fas fa-user', 'url' => ['article-magazine-release/index']],
                    ['label' => 'Материалы', 'icon' => 'fas fa-user', 'url' => ['article/index']],
                    ['label' => 'Белый список для материалов', 'icon' => 'fas fa-book', 'url' => ['article-white-list/index']],
                    ['label' => 'Проекты', 'icon' => 'fas fa-user', 'url' => ['project/index']],
                    ['label' => 'Материалы Проектов', 'icon' => 'fas fa-user', 'url' => ['project-article/index']],
                    ['label' => 'Новости', 'icon' => 'fas fa-user', 'url' => ['news/index']],
                    ['label' => 'Предметы', 'icon' => 'fas fa-book', 'url' => ['subject/index']],
                    ['label' => 'Олимпиады', 'icon' => 'fas fa-book', 'url' => ['olympiad/index']],
                    ['label' => 'Марафон Типы', 'icon' => 'fas fa-book', 'url' => ['marathon-type/index']],
                    ['label' => 'Марафон', 'icon' => 'fas fa-book', 'url' => ['marathon/index']],
                    ['label' => 'Тесты', 'icon' => 'fas fa-book', 'url' => ['test/index']],
                    ['label' => 'Результаты олимпиад', 'icon' => 'fas fa-book', 'url' => ['test-assignment/index']],
                    ['label' => 'Регионы', 'icon' => 'fas fa-book', 'url' => ['region/index']],
                    ['label' => 'Города', 'icon' => 'fas fa-book', 'url' => ['city/index']],
                    ['label' => 'Школы', 'icon' => 'fas fa-book', 'url' => ['school/index']],
                    ['label' => 'Белый список', 'icon' => 'fas fa-book', 'url' => ['white-list/index']],
                    ['label' => 'Белый список (KASPI)', 'icon' => 'fas fa-book', 'url' => ['kaspi-white-list/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
