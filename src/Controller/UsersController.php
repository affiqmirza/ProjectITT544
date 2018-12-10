<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
 
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
         $user = $this->Users->get($id, [
            'contain' => []
        ]);
 
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect('/users/login/');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //$role = $this->request->getData()['role'];
            if ($user) {
                $this->Auth->setUser($user);
                $_SESSION['user_id'] = $this->Auth->user()['id'];
                $_SESSION['user_role'] = $this->Auth->user()['role'];
                
                echo $_SESSION['user_role'];
                if($_SESSION['user_role'] == 1)
                {
                    return $this->redirect($this->Auth->redirectUrl('/booking/listbooking/'));
                }
                elseif ($_SESSION['user_role'] == 2) {
                    return $this->redirect($this->Auth->redirectUrl('/users/list/'));
                }
                elseif($_SESSION['user_role'] == 3){
                    return $this->redirect($this->Auth->redirectUrl('/users/index/'));
                }
                
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout','add','list']);

    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    /*public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        //The add and tags actions are always allowed to logged in users.
        if(in_array($action, ['add','tags'])){
            return true;
        }

        //All other actions require a slug.
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        // Check that the article belongs to the current user.
        $user = $this->Articles->findBySlug($slug)->first();

        return $user->user_id === $user['id'];
    }*/

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function list()
    {
               //$users = $this->paginate($this->users);

        //$this->set(compact('products'));

        $this->paginate = [
            //'fields' => ['users.id'],
            'order' => [
                'users.fname' => 'asc'
            ]
        ];
        $users = $this->paginate($this->Users->find('all')->where(['role ='=>'1']));
        $this->set(compact('users'));

    }

    public function temp()
    {
        $id = $this->request->getData()['id'];
            
        $_SESSION['id'] = $id;

        //$this->Flash->success($_COOKIE['id']);

        //echo $_SESSION['id'];
        return $this->redirect(['controller'=>'Booking','action' => 'add',]);
    }

    public function isAuthorized($user){
        return true;
    }

    public function liststudent()
    {
        $bookingsTable = TableRegistry::get('Booking');
        $booking = $bookingsTable->find('all');
        //$id = $this->Auth->user()['id'];
        //$users = $this->paginate($this->Users->find('all')->where(['usersid'=>$id]));
        //->where(['usersid'=>$_SESSION['user_id']])
        $this->set(compact('booking'));

    }
    
   public function search()
    {
        $this->request->allowMethod('ajax');
   
        $keyword = $this->request->query('keyword');
        $query = $this->Users->find('all',[
              'conditions' => ['username LIKE'=>'%'.$keyword.'%'],
              'order' => ['Users.username'=>'DESC'],
              'limit' => 10
        ]);
        $this->set('users', $this->paginate($query));
        $this->set('_serialize', ['users']);
    }

}
