<div class="users form">
<?php echo $this->HTML->link('Login',array('controller'=>'users','action'=>'login'));?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Add User');?></legend>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('email');
        //echo $this->Form->input('role');
    ?>
    <?php echo $this->Form->end(__('Submit'));?>
</div>

<!-- <div class='actions'>
    <h3><?php echo __('Actions');?></h3>
    <ul>
        <li><?php echo $this->HTML->link(__('List Users'),array('controller'=>'users','action'=>'index'));?></li>
        <li><?php echo $this->HTML->link(__('List Posts'),array('controller'=>'posts','action'=>'index'));?></li>
        <li><?php echo $this->HTML->link(__('New Post'),array('controller'=>'posts','action'=>'add'));?></li>
        <li><?php echo $this->HTML->link(__('List Topics'),array('controller'=>'topics','action'=>'index'));?></li>
        <li><?php echo $this->HTML->link(__('New Topic'),array('controller'=>'topics','action'=>'add'));?></li>
    </ul>
</div> -->