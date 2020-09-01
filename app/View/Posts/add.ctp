<h1>Create a new Post</h1>
<?php
    echo $this->Form->create('Post', array('type' => 'file','enctype' => 'multipart/form-data'));
    //echo $this->Form->input('user_id');
    //echo $this->Form->input('topic_id');
    echo $this->Form->input('body');
    echo $this->Form->input('upload', array('type' => 'file')); 
    echo $this->Form->end('Create Post');