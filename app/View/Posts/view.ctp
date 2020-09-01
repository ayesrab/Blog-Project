<h1><?php echo $post['Post']['body'];?></h1>
<?php echo $this->Html->image('uploads/posts/' . $post['Post']['image']); ?>
<!-- <?php echo '<pre>'; print_r($post['Post'])?> -->

<!-- <?php echo $this->HTML->link('Create a post in this topic',array('controller'=>'posts','action'=>'add',$post['Post']['id']));?> -->