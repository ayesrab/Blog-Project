<?php
        App::import('Controller','Users');
?>

<h1><?php echo $topic['Topic']['title'];?></h1>

<?php echo $this->HTML->link('Create a post in this topic',array('controller'=>'posts','action'=>'add',$topic['Topic']['id']));?>

<!-- <pre><?php echo print_r($topic)?> </pre> -->
<br>
<table>
<thead>
<tr><td>Sr. No.</td><td>User</td><td>Post</td><td>Images</td></tr>
</thead>
<tbody>
<?php $counter=1;
     foreach($topic['Post'] as $post) :?>
        <?php $ucontroller=new UsersController;
        $uname=$ucontroller->getUsernameById($post['user_id']);?>
        <tr>
                <td><?php echo $counter;?></td>
                <td><?php echo $uname['User']['username'];?></td>
                <td><?php echo $this->HTML->link($post['body'],array('controller'=>'posts','action'=>'view',$post['id']));?></td>
                <td><?php echo $this->Html->image('uploads/posts/' . $post['image']);?></td>
        </tr>
        <!-- echo "<tr><td>$counter</td><td>".$uname['User']['username']."</td><td>".$post['body']."</td><td>".$post['image']."</tr>"; -->
        <?php $counter++;?>
<!-- } -->
<?php endforeach;?>
</tbody>
</table>

<!-- <td>".$post['Post']['image']." -->