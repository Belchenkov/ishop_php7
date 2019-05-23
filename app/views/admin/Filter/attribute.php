<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Фильтры
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/filter/attribute-group"> Группы фильтров</a></li>
        <li class="active">Фильтры</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <a
                            href="<?=ADMIN;?>/filter/attribute-add"
                            class="btn btn-primary">
                            <i class="fa fa-fw fa-plus"></i> Добавить атрибут
                        </a>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Наименование</th>
                                <th>Группа</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($attrs as $id => $item): ?>
                                <tr>
                                    <td><?=$item['value'];?></td>
                                    <td><?=$item['title'];?></td>
                                    <td>
                                        <a href="<?=ADMIN;?>/filter/attribute-edit?id=<?=$id;?>">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <a
                                            class="delete text-danger"
                                            href="<?=ADMIN;?>/filter/attribute-delete?id=<?=$id;?>">
                                            <i class="fa fa-fw fa-close text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->