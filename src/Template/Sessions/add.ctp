<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Booking'), ['action' => 'index']) ?></li>
    </ul>
</nav>-->
<!DOCTYPE html>
    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
                    <strong class="blue-text">B-COUNSELLING</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="#C4">About Us</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link waves-effect" href="#C5">Our Team</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link waves-effect" href="#" target="_blank" data-toggle="modal" data-target="#modalLRForm">Login/Signup</a>
                        </li>-->
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                    
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

    </header>
    <br></br>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
        </ul>
    </nav>
    <div class="sessions form large-9 medium-8 columns content">
        <?= $this->Form->create(null,['type'=>'POST','url'=> ['controller'=>'Sessions','action'=>'add'],'class'=>'']) ?>
        <fieldset>
            <legend><?= __('Add Session') ?></legend>
            <!--<?php
                echo $this->Form->control('problems',['type'=>'text']);
                //echo $this->Form->control('Bookingid',['value'=>$_SESSION['book_id']]);
            ?>-->
            <p>Problem <input type="text" name="problems"></p>
            <input type="text" name="Bookingid" value= <?= $_SESSION['book_id'] ?> >
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
 </html>