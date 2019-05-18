<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Новый товар
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/product">Список товаров</a></li>
        <li class="active">Новый товар</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/product/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Наименование товара</label>
                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                id="title"
                                placeholder="Наименование товара"
                                value="<?php isset($_SESSION['form_data']['title']) ?
                                    h($_SESSION['form_data']['title']) : null; ?>" required
                            >
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Родительская категория</label>
                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/select.php',
                                'container' => 'select',
                                'cache' => 0,
                                'cacheKey' => 'admin_select',
                                'class' => 'form-control',
                                'attrs' => [
                                    'name' => 'category_id',
                                    'id' => 'category_id',
                                ],
                                'prepend' => '<option>Выберите категорию</option>',
                            ]) ?>
                        </div>

                        <div class="form-group">
                            <label for="keywords">Ключевые слова</label>
                            <input
                                type="text"
                                name="keywords"
                                class="form-control"
                                id="keywords"
                                placeholder="Ключевые слова"
                                value="<?php isset($_SESSION['form_data']['keywords'])
                                    ? h($_SESSION['form_data']['keywords']) : null; ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input
                                type="text"
                                name="description"
                                class="form-control"
                                id="description"
                                placeholder="Описание"
                                value="<?php isset($_SESSION['form_data']['description'])
                                    ? h($_SESSION['form_data']['description']) : null; ?>"
                            >
                        </div>

                        <div class="form-group has-feedback">
                            <label for="price">Цена</label>
                            <input
                                type="text"
                                name="price"
                                class="form-control"
                                id="description"
                                placeholder="Цена" pattern="^[0-9.]{1,}$"
                                value="<?php isset($_SESSION['form_data']['price']) ?
                                    h($_SESSION['form_data']['price']) : null; ?>"
                                required
                                data-error="Допускаются цифры и десятичная точка"
                            >
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="old_price">Цена</label>
                            <input
                                type="text"
                                name="old_price"
                                class="form-control"
                                id="description"
                                placeholder="Старая цена"
                                pattern="^[0-9.]{1,}$"
                                value="<?php isset($_SESSION['form_data']['old_price'])
                                    ? h($_SESSION['form_data']['old_price']) : null; ?>"
                                data-error="Допускаются цифры и десятичная точка"
                            >
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="content">Контент</label>
                            <textarea
                                name="content"
                                id="editor1"
                                cols="80"
                                rows="10"
                            >
                                <?php isset($_SESSION['form_data']['old_price'])
                                    ? $_SESSION['form_data']['old_price'] : null; ?>
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status" checked> Статус
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="hit"> Хит
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="related">Связанные товары</label>
                            <select name="related[]" class="form-control select2" id="related" multiple></select>
                        </div>

                        <?php new \app\widgets\filter\Filter(null, WWW . '/filter/admin_filter_tpl.php');?>

                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Базовое изображение</h3>
                                    </div>
                                    <div class="box-body">
                                        <div
                                            id="single"
                                            class="btn btn-success"
                                            data-url="product/add-image"
                                            data-name="single"
                                        >Выбрать файл</div>
                                        <p><small>Рекомендуемые размеры: 125x200</small></p>
                                        <div class="single"></div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="box box-primary box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Картинки галерии</h3>
                                    </div>
                                    <div class="box-body">
                                        <div
                                                id="multi"
                                                class="btn btn-success"
                                                data-url="product/add-image"
                                                data-name="multi"
                                        >Выбрать файл</div>
                                        <p><small>Рекомендуемые размеры: 700x1000</small></p>
                                        <div class="single"></div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>
                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->