<?php foreach($this->groups as $group_id => $group_item) : ?>
    <section  class="sky-form">
        <h4><?=$group_item;?></h4>
        <div class="row1 scroll-pane">
            <div class="col col-4">
                <?php foreach($this->attrs[$group_id] as $attr_id => $value) : ?>
                    <label class="checkbox">
                        <input
                            type="checkbox"
                            name="checkbox"
                            value="<?=$attr_id;?>"
                        ><i></i><?=$value;?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endforeach; ?>
