<?= $this->Flash->render() ?>
<?= $this->Form->create(); ?>
    <fieldset>
        <legend><?= __('ユーザーIDとパスワードを入力してください') ?> </legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('login')) ?>
<?= $this->Form->end(); ?>