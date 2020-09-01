<?php

App::uses('AppModel', 'Model');

class Post extends AppModel{
    public $belongsTo=array(
        'Topic'=>array(
            'className'=>'Topic',
            'foreignKey'=>'topic_id',
            'conditions'=>'',
            'fields'=>'',
            'order'=>''
        ),
        'User'=>array(
            'className'=>'User',
            'foreignKey'=>'user_id',
            'conditions'=>'',
            'fields'=>'',
            'order'=>''
        )
    );
}