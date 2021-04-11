<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TKeisan $tKeisan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tKeisan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tKeisan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List T Keisans'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tKeisans form large-9 medium-8 columns content">
    <?= $this->Form->create($tKeisan) ?>
<?php
// ユーザーオブジェクトよりセレクトボックスデータ整形
$selUser = [];
foreach($users as $uRow){
    $selUser[$uRow->id] = $uRow->username;
}
// TODO あってるのかな、もっとコンパクトにデータを作れそうやけど。。
$selCategory = [];
foreach($categories as $cRow){
    $selCategory[$cRow['categoryCd']] = $cRow['categoryName'];
}
?>
    <fieldset>
        <legend><?= __('Edit T Keisan') ?></legend>
        <?php
            echo $this->Form->input('userId', array('label'=>'User Name', 'type'=>'select', 'options'=>$selUser , 'value' =>$tKeisan->userId));
            // echo $this->Form->select(
            //     'userId', 
            //     // [
            //     //     '1' => 'dev',
            //     //     '2' => 'sakemin'
            //     // ], 
            //     $selUser,
            //     ['value' => $tKeisan->userId, 'class' => 'form-control']
            // );
            echo $this->Form->control('targetDate', [
                'empty' => true,
                'type'  => 'text'
            ]);
            // echo $this->Form->control('category');
            echo $this->Form->input('category', 
                array('label'=>'Category Name', 'type'=>'select', 'options'=>$selCategory , 'value' =>$tKeisan->category)
            );
            echo $this->Form->control('sum');
            echo $this->Form->control('koumoku');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
