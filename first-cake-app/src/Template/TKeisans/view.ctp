<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TKeisan $tKeisan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit T Keisan'), ['action' => 'edit', $tKeisan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete T Keisan'), ['action' => 'delete', $tKeisan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tKeisan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List T Keisans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T Keisan'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tKeisans view large-9 medium-8 columns content">

    <h3>ID:<?= h($tKeisan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('カテゴリー') ?></th>
            <td><?= h($tKeisan->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('金額') ?></th>
            <td><?= h($tKeisan->sum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('項目名') ?></th>
            <td><?= h($tKeisan->koumoku) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('作成者') ?></th>
            <td><?= h($tKeisan->b['username']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('対象日') ?></th>
            <td><?= h($tKeisan->targetDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('作成日') ?></th>
            <td><?= h($tKeisan->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?= h($tKeisan->modified) ?></td>
        </tr>
    </table>
</div>
