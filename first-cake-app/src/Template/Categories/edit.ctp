<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Edit Category') ?></legend>
        <?php
            // echo $this->Form->control('categoryCd');
            // echo $this->Form->control('categoryName');
            // echo $this->Form->control('subCategoryName');
            // echo $this->Form->control('koumoku');
            echo $this->Form->control('categoryCd',['label' => 'カテゴリーコード']);
            echo $this->Form->control('categoryName',['label' => 'カテゴリー名']);
            echo $this->Form->control('subCategoryName',['label' => 'サブカテゴリー名']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
