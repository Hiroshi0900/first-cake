<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Form $form
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $form->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $form->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Forms'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="forms form large-9 medium-8 columns content">
    <?= $this->Form->create($form) ?>
    <fieldset>
        <legend><?= __('Edit Form') ?></legend>
        <?php
            echo $this->Form->control('sei');
            echo $this->Form->control('mei');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
