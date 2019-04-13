<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="images/bnr-1.jpg" alt=""/>
            </li>
            <li>
                <img src="images/bnr-2.jpg" alt=""/>
            </li>
            <li>
                <img src="images/bnr-3.jpg" alt=""/>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends-->

<!--about-starts-->
<?php if ($brands) : ?>
    <div class="about">
        <div class="container">
            <div class="about-top grid-1">
                <?php foreach($brands as $brand) : ?>
                    <div class="col-md-4 about-left">
                        <figure class="effect-bubba">
                            <img class="img-responsive" src="images/<?= $brand->img; ?>" alt="<?= $brand->title; ?>"/>
                            <figcaption>
                                <h2><?= $brand->title; ?></h2>
                                <p><?= $brand->description; ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--about-end-->

<!--product-starts-->
<?php if ($hits) : ?>
<?php $curr = \ishop\App::$app->getProperty('currency'); ?>
    <div class="product">
        <div class="container">
            <div class="product-top">
                <div class="product-one">
                    <?php foreach($hits as $hit) : ?>
                        <div class="col-md-3 product-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="product/<?= $hit->alias; ?>" class="mask">
                                    <img
                                        class="img-responsive zoom-img"
                                        src="images/<?= $hit->img; ?>"
                                        alt="<?= $hit->title; ?>"
                                    />
                                </a>
                                <div class="product-bottom">
                                    <h3>
                                        <a href="product/<?= $hit->alias; ?>"><?= $hit->title; ?></a>
                                    </h3>
                                    <p>Explore Now</p>
                                    <h4>
                                        <a data-id="<?=$hit->id;?>" class="add-to-cart-link" href="cart/add?id=<?= $hit->id; ?>">
                                            <i></i>
                                        </a>
                                        <span class=" item_price">
                                            <?=$curr['symbol_left'];?> <?= $hit->price * $curr['value']; ?> <?=$curr['symbol_right'];?>
                                        </span>
                                        <?php if ($hit->old_price) : ?>
                                            <small><del>
                                                    <?=$curr['symbol_left'];?>
                                                    <?= $hit->old_price * $curr['value']; ?>
                                                    <?=$curr['symbol_right'];?>
                                                </del></small>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <div class="srch">
                                    <span>-50%</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--product-end-->
