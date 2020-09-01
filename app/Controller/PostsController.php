<?php

class PostsController extends AppController{

    //public $components=array('Session');

    public function index(){

        if(AuthComponent::user('role')==1){
            $this->redirect(array('controller'=>'topics','action'=>'index'));
        }

        //$data=$this->Post->find('all');
        $this->Post->recursive=0;
        //$data=$this->Paginator->paginate('Post',array(),array('id','created','modified'));
        $this->paginate=['limit'=>'4'];
        $this->set('posts',$this->Paginator->paginate());
    }

    public function add($id){
        if($this->request->is('post')){
            $this->Post->create();
            $this->request->data['Post']['topic_id']=$id;
            $this->request->data['Post']['user_id']=AuthComponent::user('id');
            if(!empty($this->request->data['Post']['upload']['name']))
                {
                        echo '<pre>'; print_r($this->request->data['Post']['upload']);
                        $file = $this->request->data['Post']['upload']; //put the data into a var for easy use

                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext))
                        {
                                //do the actual uploading of the file. First arg is the tmp name, second arg is 
                                //where we are putting it
                                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/posts/' . $file['name']);

                                //prepare the filename for database entry
                                $this->request->data['Post']['image'] = $file['name'];
                        }
                }
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash('Post Created!');
                $this->redirect('/topics/view/'.$id);
            }
        }
        $this->set('topics',$this->Post->Topic->find('list'));
    }

    public function view($id){
        $data=$this->Post->findById($id);
        $this->set('post',$data);
    }
}