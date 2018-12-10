<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rooms form large-9 medium-8 columns content">
    <?= $this->Form->create(null,['type'=>'POST','url'=> ['controller'=>'Booking','action'=>'temp'],'class'=>'']) ?>
    <fieldset>
        <legend><?= __('Add Room') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $id;   

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

</div>
