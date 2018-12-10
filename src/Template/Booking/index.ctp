<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking[]|\Cake\Collection\CollectionInterface $booking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><a href="/ProjectITT544/users/index" >List Users</a>
        <li><a href="/ProjectITT544/sessions/index/" >List Session</a>
        <li><a href="/ProjectITT544/users/logout" >Logout</a>

    </ul>
</nav>
<div class="booking index large-9 medium-8 columns content">
    <h3><?= __('Booking') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usersid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roomid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($booking as $booking): ?>
            <tr>
                <td><?= $this->Number->format($booking->id) ?></td>
                <td><?= h($booking->date) ?></td>
                <td><?= h($booking->time) ?></td>
                <td><?= $this->Number->format($booking->usersid) ?></td>
                <td><?= $this->Number->format($booking->roomid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $booking->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?>
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
