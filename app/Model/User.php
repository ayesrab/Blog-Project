<?php

App::uses('AppModel', 'Model');

class User extends AppModel{

    public $validate=array(
        'username'=>array(
            
                'rule'=>'notBlank',
            
        ),
        'password'=>array(
            'rule'=>'notBlank',
        ),
        'email'=>array(
            'rule'=>'notBlank',
        ),
        'role'=>array(
            'rule'=>'notBlank',
        ),
    );

    public $hasMany=array(
        'Topic'=>array(
            'className'=>'Topic',
            'foreignKey'=>'user_id',
            'dependent'=>false,
            'conditions'=>'',
            'fields'=>'',
            'order'=>'',
            'limit'=>'',
            'offset'=>'',
            'exclusive'=>''
        ),
        'Post'=>array(
            'className'=>'Post',
            'foreignKey'=>'user_id',
            'dependent'=>false,
            'conditions'=>'',
            'fields'=>'',
            'order'=>'',
            'limit'=>'',
            'offset'=>'',
            'exclusive'=>''
        )
        );

        public function checkLogin($datas,$submittedData){
            foreach($datas as $data){
                if($data['User']['username']==$submittedData['User']['username'] && $data['User']['password']==$submittedData['User']['password']){
                    session_start();
                    $_SESSION['data']=$data;
                    return true;
                }
            }
            return false;
        }
}




    /*
    public function fetchUsers(){
        $result = $this->find('all',array('conditions'=>array('id>0'),'fields'=>array('id','username','email')));
        echo '<pre>';
        print_r($result);
        exit();
    }

    public function addUser($req){
        $userData['email'] = $req['useremail'];
        $userData['username'] = $req['username'];
        $userData['password'] = $req['password'];
            $this->create($userData);
            if($this->save($userData)){
                return true;
            }
            return false;
            
    }*/