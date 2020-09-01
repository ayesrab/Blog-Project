<?php

class TopicsController extends AppController{

    public $components=array('Session');

    public function beforeFilter(){
        $this->Auth->allow('index');
    }

    
    public function index(){
        $this->Topic->recursive=0;
        //$data=$this->Topic->find('all');
        $this->paginate=['limit'=>'4'];
        $key=$this->request->query('key');
        //exit($key);
        if($key){
            //$this->paginate=['conditions'=>['Topic.title'=>'%'.$key.'%' ],'limit'=>'4'];
            // print_r($this->paginate);
            // exit();
        
           $data =  $this->Paginator->paginate('Topic',array('Topic.title LIKE'=>'%'.$key.'%' ));
           //echo '<pre>';print_r($data);exit;
            $this->set('topics',$data);
        }else{
            $this->set('topics',$this->Paginator->paginate());
        }
    }

    public function add(){
        if($this->request->is('post')){
            $this->Topic->create();
            if(AuthComponent::user('role') == 1){
                $this->request->data['Topic']['visible']=2;
            }
            $this->request->data['Topic']['user_id']=AuthComponent::user('id');
            if($this->Topic->save($this->request->data)){
                $this->Session->setFlash('Topic Created!');
                $this->redirect('index');
            }
        }
    }
    
    public function view($id){
        $data=$this->Topic->findById($id);
        $this->set('topic',$data);
    }

    public function edit($id){
        if(AuthComponent::user('role')==1){
            $this->redirect('index');
        }
        $data=$this->Topic->findById($id);
        if($this->request->is(array('post','put'))){
            $this->Topic->id=$id;
            if($this->Topic->save($this->request->data)){
                $this->Session->setFlash('Topic Updated!');
                $this->redirect('index');
            }
        }
        $this->request->data=$data;
    }

    public function delete($id){
        if(AuthComponent::user('role')==1){
            $this->redirect('index');
        }
        $this->Topic->id=$id;
        if($this->request->is(array('post','put'))){
            if($this->Topic->delete($this->request->data)){
                $this->Session->setFlash('Topic Deleted!');
                $this->redirect('index');
            }
        }
    }
}