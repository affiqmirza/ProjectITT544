<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Booking'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="booking form large-9 medium-8 columns content">
    <?= $this->Form->create(null,['type'=>'POST','url'=> ['controller'=>'Booking','action'=>'add'],'class'=>'']) ?>
    <fieldset>
        <legend><?= __('Add Booking') ?></legend>
        <!--<?php echo $id; ?>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('time');
            echo $this->Form->control('usersid',['value'=> $id]);
        ?>-->
        <input type="date" name="date">
        <input type="time" name="time">
        <input type="hidden" name="usersid" value=<?= $id ?>>
        <select name="roomid" class="">
            <?php foreach($rooms as $room): ?>
                <option value=<?= $room->id ?>><?= $room->name ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>
    <!--<?= $this->Form->text('bookingid',['value'=>$booking->id]); ?>-->
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
