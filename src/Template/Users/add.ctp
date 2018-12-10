<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>-->
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <!--<?php
            echo $this->Form->control('fname');
            echo $this->Form->control('lname');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('role');
            echo $this->Form->control('phoneno');
        ?>-->
        <p>First Name<input type="text" name="fname"></p>
        <p>Last Name<input type="text" name="lname"></p>
        <p>Username<input type="text" name="username"></p>
        <p>Password<input type="text" name="password"></p>
         <select name="role">
            <option value="1" selected="selected">Counsellor</option>
            <option value="2">Student</option>
            <option value="3">Administrator</option>
        </select>
        <p>Phone No<input type="text" name="phoneno"></p>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <a class="btn btn-primary btn-md" href="/ProjectITT544/users/login">Back to Login Page</a>
    <?= $this->Form->end() ?>
</div>
