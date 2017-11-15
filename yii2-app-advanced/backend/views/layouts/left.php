<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' =>mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id),
                   /* [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => '首页', 'icon' => 'file-code-o', 'url' => ['/admin/index']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Login', 'url' => ['admin/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => '商品管理', 'icon' => 'file-code-o', 'url' => ['goods/index']],
                    [
                        'label' => '品牌管理',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => '品牌列表', 'icon' => 'file-code-o', 'url' => ['brand/index'],],
                            ['label' => '品牌添加', 'icon' => 'dashboard', 'url' => ['brand/add'],],
                        ],
                    ],
                    [
                        'label' => '文章分类',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => '文章分类列表', 'icon' => 'file-code-o', 'url' => ['article-category/index'],],
                            ['label' => '文章分类添加', 'icon' => 'dashboard', 'url' => ['article-category/add'],],
                            ],
                    ],
                    [
                        'label' => '商品分类',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => '商品分类列表', 'icon' => 'file-code-o', 'url' => ['goods-category/index'],],
                            ['label' => '商品分类添加', 'icon' => 'dashboard', 'url' => ['goods-category/add'],],
                        ],
                    ],
                ],*/
            ]
        ) ?>

    </section>

</aside>
