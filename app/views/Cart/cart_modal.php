<?php if (!empty($_SESSION['cart'])) : ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['cart'] as $id => $item) : ?>
                    <tr>
                        <td>
                            <a href="product/<?=$item['alias'];?>">
                                <img src="images/<?=$item['img'];?>" alt="<?=$item['alias'];?>">
                            </a>
                        </td>
                        <td>
                            <a href="product/<?=$item['alias'];?>">
                                <?=$item['title'];?>
                            </a>
                        </td>
                        <td><?=$item['qty'];?></td>
                        <td><?=$item['price'];?></td>
                        <td>
                            <span
                                class="glyphicon glyphicon-remove text-danger del-item"
                                data-id="<?=$id;?>"
                            ></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td>Итого:</td>
                    <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'];?></td>
                </tr>
                <tr>
                    <td>На сумму:</td>
                    <td colspan="4" class="text-right cart-sum">
                        <?=$_SESSION['cart.currency']['symbol_left'];?>
                        <?=$_SESSION['cart.sum'];?>
                        <?=$_SESSION['cart.currency']['symbol_right'];?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>