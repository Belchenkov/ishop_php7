<?php $parent_id = \ishop\App::$app->getProperty('parent_id'); ?>
<option
        value="<?=$id;?>"<?php if($id == $parent_id) echo ' selected'; ?><?php if(isset($_GET['id']) && $id == $_GET['id']) echo ' disabled'; ?>>
    <?=$tab . $category['title'];?>
</option>
<?php if(isset($category['childs'])): ?>
    <?= $this->getMenuHtml($category['childs'], '&nbsp;' . $tab. '-') ?>
<?php endif; ?>