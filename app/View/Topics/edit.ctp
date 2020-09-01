<h1>Edit Topic</h1>
<?php
    echo $this->Form->create('Topic');
    //echo $this->Form->input('user_id');
    echo $this->Form->input('title');
    if(AuthComponent::user('role')==2){
        echo $this->Form->select('Visible',array('1'=>'Published','2'=>'Hidden'),array('empty'=>false));
    }
    echo $this->Form->end('Edit topic');