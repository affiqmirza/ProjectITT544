<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

<!DOCTYPE html>
<head>
    <?= $this->Html->charset() ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('mdb.css') ?>
    <?= $this->Html->css('mdb.lite.css') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>


    <?= $this->Html->css('material-compiled.css') ?>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

</head>

<body>
<!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
                    <strong class="blue-text">B-Counselling</strong>
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
                            <a class="nav-link waves-effect" href="http://localhost/ProjectITT544/">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        
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
                

        <br></br><br></br>
        <!--Login Form 
        <div class="container">
            <div class="row">
                <div class="cols-lg-12">
                    <h1 style="font-colour: blue">Login</h1>
                    <?= $this->Form->create() ?>
                    <?= $this->Form->control('username') ?>
                    <?= $this->Form->control('password') ?>
                    <?= $this->Form->control('admin',['type' => 'checkbox']) ?>
                    <?= $this->Form->checkbox('published', ['hiddenField' => false]) ?>
                    <?= $this->Form->button('login') ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            
        </div>-->

        <br></br>
        <!-- Material form login -->
        <div class="container">

            <?php echo $this->Flash->render() ?>
            <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Sign in</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <?= $this->Form->create() ?>

                        <!-- username -->
                        <div class="md-form">
                            <?= $this->Form->control('username') ?>
                        </div>

                        <!-- Password -->
                        <div class="md-form">
                            <?= $this->Form->control('password') ?>
                        </div>

                        
                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Student 
                                <div class="form-check">
                                    <input type="radio" name="role" class="form-check-input" id="student" value="2">
                                    <label class="form-check-label" for="student">Student</label>
                                </div>-->
                            </div>
                            <div>
                                <!-- Counsellor 
                                <div class="form-check">
                                    <input type="radio" name="role" class="form-check-input" id="counsellor" value="1">
                                    <label class="form-check-label" for="counsellor">Counsellor</label>
                                </div>-->
                            </div>
                            <div>
                                <!-- Admin 
                                <div class="form-check">
                                    <input type="radio" name="role" class="form-check-input" id="admin" value="3">
                                    <label class="form-check-label" for="admin">Admin</label>
                                </div>-->
                            </div>
                            
                        </div>

                        <!-- Sign in button -->
                        <!--<?= $this->Form->button('Login') ?>-->
                        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"> Sign in</button>

                        <!-- Register -->
                        <p>Not a member?
                            <a href="http://localhost/ProjectITT544/users/add">Register</a>
                        </p>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

    </header>
</body>
</html>

<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('bootstrap.js') ?>
<?= $this->Html->script('jquery-3.3.1.min.js') ?>
<?= $this->Html->script('mdb.js') ?>
<?= $this->Html->script('mdb.min.js') ?>
<?= $this->Html->script('popper.min.js') ?>
<?= $this->Html->script('material-compiled.js') ?>
<script type="text/javascript">


   $(document).ready(function() {
            $('.mdb-select').material_select();
                // SideNav Button Initialization
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
Ps.initialize(sideNavScrollbar);
        })
</script>