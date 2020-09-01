<?php

App::uses('AppModel', 'Model');

class Topic extends AppModel{
    public $displayField='title';

    public $validate=array(
        'id'=>array(
            'rule'=>'notBlank',
            
        ),
        'user_id'=>array(
            'rule'=>'notBlank',
        ),
        'title'=>array(
            'rule'=>'notBlank',
        ),
        'visible'=>array(
            'rule'=>'notBlank',
        ),
    );

    public $belongsTo=array(
        'User'=>array(
            'className'=>'User',
            'foreignKey'=>'user_id',
            'conditions'=>'',
            'fields'=>'',
            'order'=>''
        )
        );

    public $hasMany=array(
        'Post'=>array(
            'className'=>'Post',
            'foreignKey'=>'topic_id',
            'dependent'=>false,
            'conditions'=>'',
            'fields'=>'',
            'order'=>'',
            'limit'=>'',
            'offset'=>'',
            'exclusive'=>''
        )
        );
}
