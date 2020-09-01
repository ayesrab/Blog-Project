<h1>Login</h1>
<br>
<?php echo $this->HTML->link('Register',array('controller'=>'users','action'=>'add'));?>
<br>
<!-- <?php echo $this->Flash->render('auth'); ?> -->
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
?>