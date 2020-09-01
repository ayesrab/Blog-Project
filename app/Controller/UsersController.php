<?php

class UsersController extends AppController{

    //public $components=array('Paginator');

    public function beforeFilter(){
        $this->Auth->allow('add');
    }
    
    public function login(){
        if($this->request->is('post')){
            if($this->Auth->login()){
                return $this->redirect($this->Auth->redirectUrl());
            }else {
                $this->Session->setFlash('Invalid Username or Password');
            }
        }
    }  
    
    public function logout(){
        $this->Auth->logout();
        $this->redirect('/topics/index');
    }
   

    public function index(){

        if(AuthComponent::user('role')==1){
            $this->redirect(array('controller'=>'topics','action'=>'index'));
        }

        $this->User->recursive=0;
        //print_r($this->Paginator->paginate());
        $this->paginate=['limit'=>'4'];
        $key=$this->request->query('key');
        if($key){
            $this->set('users',$this->Paginator->paginate('User',array('User.username LIKE'=>'%'.$key.'%' )));
        }else{
            $this->set('users',$this->Paginator->paginate());
        }
    }

    public function getUsernameById($id){
        $data=$this->User->findById($id);
        return $data;
    }

    public function view($id=null){

        if(AuthComponent::user('role')==1){
            $this->redirect(array('controller'=>'topics','action'=>'index'));
        }

        if(!$this->User->exists($id)){
            throw new NotFoundException(__('Invalid User'));
        }
        $options=array('conditions'=>array('User.' . $this->User->primaryKey=>$id));
        $this->set('user',$this->User->find('first',$options));
    }

    public function add(){
        if($this->request->is('post')){
            $this->User->create();
            $this->request->data['User']['password']=AuthComponent::password($this->request->data['User']['password']);
            $this->request->data['User']['role']=1;
            if($this->User->save($this->request->data)){
                $this->Session->setFlash(__('User Created'));
                return $this->redirect(array('action'=>'index'));
            }else {
                $this->Session->setFlash(__('User cannot be created.Try again!'));
            }
        }
    }

    public function edit($id=null){

        if(AuthComponent::user('role')==1){
            $this->redirect(array('controller'=>'topics','action'=>'index'));
        }

        if(!$this->User->exists($id)){
            throw new NotFoundException(__('Invalid User'));
        }
        if($this->request->is(array('post','put'))){
            if($this->User->save($this->request->data)){
                $this->Session->setFlash(__('User Updated'));
                return $this->redirect(array('action'=>'index'));
            }else {
                $this->Session->setFlash(__('User cannot be updated.Try again!'));
            }
        }else {
            $options=array('conditions'=>array('User.' . $this->User->primaryKey=>$id));
            $this->request->data=$this->User->find('first',$options);
        }
    }

    public function delete($id=null){

        if(AuthComponent::user('role')==1){
            $this->redirect(array('controller'=>'topics','action'=>'index'));
        }
        
        $this->User->id=$id;
        if(!$this->User->exists($id)){
            throw new NotFoundException(__('Invalid User'));
        }
        $this->request->allowMethod('post','delete');
        if($this->User->delete()){
            $this->Session->setFlash(__('User Deleted'));
        }else {
            $this->Session->setFlash(__('User cannot be deleted.Try again!'));
        }
        return $this->redirect(array('action'=>'index'));
    }
}


/*

    public function login(){
        $data=$this->User->find('all');
        if($this->request->is('post')){
            $submittedData=$this->request->data;
            if($this->User->checkLogin($data,$submittedData)){
                $this->Session->setFlash(__('Login Successfull'));
                $this->redirect(array('controller'=>'topics','action'=>'index'));
            }else{
                $this->Session->setFlash(__('Invalid Username or Password'));
            }    
        }
    }

    public function logout(){
        $this->redirect(array('controller'=>'users','action'=>'login'));
    }
*/