<!-- <pre><?php echo print_r($topics);?></pre> -->

<h1>Topics</h1>
<br>
<?php echo $this->HTML->link('Create a new topic',array('controller'=>'topics','action'=>'add'));?>
<br>
<?php
    if(AuthComponent::user()){
        echo $this->HTML->link('Logout',array('controller'=>'users','action'=>'logout'));
    }else {
        echo $this->HTML->link('Login',array('controller'=>'users','action'=>'login')).' or '.$this->HTML->link('Register',array('controller'=>'users','action'=>'add'));
    }
?>
<!-- <?php echo $this->HTML->link('Logout',array('controller'=>'users','action'=>'logout'));?> -->
<br>
<br>
<?php
    echo $this->Form->create(null,['type'=>'get']);
    echo $this->Form->input('key',['label'=>'Search','value'=>$this->request->query('key')]);
    echo $this->Form->end('Submit');
?>
<table>
<thead>
    <tr>
        <th><?php echo $this->Paginator->sort('title');?></th>
        <th>User Name</th>
        <th><?php echo $this->Paginator->sort('created');?></th>
        <th><?php echo $this->Paginator->sort('modified');?></th>
        <?php if(AuthComponent::user('role')==2):?>
        <th>Published</th>
        <th>Edit</th>
        <th>Delete</th>
        <?php endif;?>
        <!-- <th>Title</th>
        <th>User Name</th>
        <th>Published</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Edit</th>
        <th>Delete</th> -->
    </tr>
    </thead>
    <tbody>
    <!-- <?php echo AuthComponent::user('role');?> -->
    <?php foreach($topics as $topic) :?>
        <tr>
        <?php if(AuthComponent::user('role')==2):?>
            <td><?php echo $this->HTML->link($topic['Topic']['title'],array('controller'=>'topics','action'=>'view',$topic['Topic']['id'])); ?></td>
            <td><?php echo $topic['User']['username']; ?></td>
            <td><?php echo $topic['Topic']['created']; ?></td>
            <td><?php echo $topic['Topic']['modified']; ?></td>
            <?php if(AuthComponent::user('role')==2):?>
            <td><?php echo $topic['Topic']['visible']; ?></td>
            <td><?php echo $this->HTML->link('Edit',array('controller'=>'topics','action'=>'edit',$topic['Topic']['id'])); ?></td>
            <td><?php echo $this->Form->postLink('Delete',array('controller'=>'topics','action'=>'delete',$topic['Topic']['id']),   array('confirm'=>'Are you sure you want to delete this topic?')); ?></td>
            <?php endif;?>
            </tr>
        <?php endif;?>
        <?php if(AuthComponent::user('role')==1 || !AuthComponent::user()):?>
        <?php if($topic['Topic']['visible']==1):?>
            <td><?php echo $this->HTML->link($topic['Topic']['title'],array('controller'=>'topics','action'=>'view',$topic['Topic']['id'])); ?></td>
            <td><?php echo $topic['User']['username']; ?></td> 
            <td><?php echo $topic['Topic']['created']; ?></td>
            <td><?php echo $topic['Topic']['modified']; ?></td>
            <?php if(AuthComponent::user('role')==2):?>
            <td><?php echo $topic['Topic']['visible']; ?></td>
            <td><?php echo $this->HTML->link('Edit',array('controller'=>'topics','action'=>'edit',$topic['Topic']['id'])); ?></td>
            <td><?php echo $this->Form->postLink('Delete',array('controller'=>'topics','action'=>'delete',$topic['Topic']['id']),   array('confirm'=>'Are you sure you want to delete this topic?')); ?></td>
            <?php endif;?>
            </tr>
        <?php endif;?>
        <?php endif;?>
    <?php endforeach; ?>
    </tbody>
    <?php unset($topic);?>
</table>
<?php
echo $this->Paginator->numbers();

// Shows the next and previous links
echo $this->Paginator->prev(
  '« Previous',
  null,
  null,
  array('class' => 'disabled')
);
echo $this->Paginator->next(
  'Next »',
  null,
  null,
  array('class' => 'disabled')
);


// prints X of Y, where X is current page and Y is number of pages
echo $this->Paginator->counter();
?>
