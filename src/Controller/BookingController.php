<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Booking Controller
 *
 * @property \App\Model\Table\BookingTable $Booking
 *
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $booking = $this->paginate($this->Booking);

        $this->set(compact('booking'));
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Booking->get($id, [
            'contain' => []
        ]);

        $this->set('booking', $booking);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        session_start();
        $this->set('id',$_SESSION['id']);
        //$this->set('roomsid',$_SESSION['roomsid']);
        $roomsTable = TableRegistry::get('Rooms');
        $rooms = $roomsTable->find('all');

        $this->set(compact('rooms'));
        $booking = $this->Booking->newEntity();
        //$id = $this->getRequest()->getSession()->read('User.id');
        if ($this->request->is('post','put')) {
            
            $booking = $this->Booking->patchEntity($booking, $this->request->getData());
            if ($this->Booking->save($booking)) {
                $_SESSION['book_id'] = $booking->id;
                $this->Flash->success(__('The booking has been saved.'));

                //$bookingid = $this->request->getData()['bookingid'];
                //echo $_SESSION['book_id'];
                //$_SESSION['bookingid'] = $bookingid;
                //$bookingTable = TableRegistry::get('Booking');
                //$books = $bookingTable->find('all')->('select'=>'id')->where();

                //echo $_SESSION['bookingid'];
                return $this->redirect(['controller'=>'Sessions','action' => 'add']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $this->set(compact('booking'));
        $this->set('users_id',$id);
        //$this->set('id',$id);
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booking = $this->Booking->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Booking->patchEntity($booking, $this->request->getData());
            if ($this->Booking->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $this->set(compact('booking'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Booking->get($id);
        if ($this->Booking->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user){
        return true;
    }

    public function list()
    {
               //$users = $this->paginate($this->users);

        //$this->set(compact('products'));
        $rooms = $this->paginate($this->Rooms, ['scope'=>'rooms']);
        $this->set(compact('rooms'));

    }

    /*public function temp()
    {
        $booking = TableRegistry::get('Booking');

        $id = $booking->find('all')->extract('id') ;
        //$this->set(compact('booking'));
        //$id = $this->request->getData()['booking'];
            
        $_SESSION['bookingid'] = $id;

        echo $_SESSION['bookingid'];
        return $this->redirect(['controller'=>'Sessions','action' => 'add']);
    }*/

    public function listbooking()
    {
        $bookingsTable = TableRegistry::get('Booking');
        $booking = $bookingsTable->find('all')->where(['usersid'=>$_SESSION['user_id']]);
        //$id = $this->Auth->user()['id'];
        //$users = $this->paginate($this->Users->find('all')->where(['usersid'=>$id]));
        //->where(['usersid'=>$_SESSION['user_id']])
        $this->set(compact('booking'));

    }
}
