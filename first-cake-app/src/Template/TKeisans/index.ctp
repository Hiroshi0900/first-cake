<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TKeisan[]|\Cake\Collection\CollectionInterface $tKeisans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New T Keisan'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tKeisans index large-9 medium-8 columns content">
    <h3><?= __('T Keisans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('targetDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('koumoku') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tKeisans as $tKeisan): ?>
            <tr>
                <td><?= $this->Number->format($tKeisan->id) ?></td>
                <td><?= h($tKeisan->b['username']) ?></td>
                <td><?= h($tKeisan->targetDate) ?></td>
                <td><?= h($tKeisan->category) ?></td>
                <td><?= h($tKeisan->sum) ?></td>
                <td><?= h($tKeisan->koumoku) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tKeisan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tKeisan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tKeisan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tKeisan->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
