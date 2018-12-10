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
<html>
<head>
	<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button1 {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
</head>
<body>
	<?php foreach ($booking as $bookings): ?>
		<h3>Booking ID : <?= h($bookings->id) ?></h3>
	    <table id="customers">
	        <tr>
	            <th scope="row"><?= __('Date') ?></th>
	            <td><?= h($bookings->date) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Time') ?></th>
	            <td><?= h($bookings->time) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Users ID') ?></th>
	            <td><?= h($bookings->usersid) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Room ID') ?></th>
	            <td><?= h($bookings->roomid) ?></td>
	        </tr>
	        <!--<tr>
	            <th scope="row"><?= __('Phoneno') ?></th>
	            <td><?= h($bookings->phoneno) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Id') ?></th>
	            <td><?= $this->Number->format($user->id) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Role') ?></th>
	            <td><?= $this->Number->format($user->role) ?></td>
	        </tr>-->
	    </table>
	<?php endforeach; ?>
<a class="button button2" href="http://localhost/ProjectITT544/users/logout">LOGOUT</a>
</body>
</html>