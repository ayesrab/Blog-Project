<h1>Posts</h1>
<!-- <pre><?php echo print_r($posts)?> -->
<table>
<thead>
    <tr>
        <th><?php echo $this->Paginator->sort('id');?></th>
        <th>Topic Title</th>
        <th><?php echo $this->Paginator->sort('image');?></th>
        <th><?php echo $this->Paginator->sort('created');?></th>
        <th><?php echo $this->Paginator->sort('modified');?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($posts as $post) :?>
        <tr>
            <td><?php echo $this->HTML->link($post['Post']['id'],array('controller'=>'posts','action'=>'view',$post['Post']['id'])); ?></td>
            <td><?php echo $this->HTML->link($post['Topic']['title'],array('controller'=>'posts','action'=>'view',$post['Post']['id'])); ?></td>
            <td><?php echo $this->Html->image('uploads/posts/' . $post['Post']['image']); ?></td>
            <td><?php echo h($post['Post']['created']);?>&nbsp;</td>
            <td><?php echo h($post['Post']['modified']);?>&nbsp;</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <?php unset($posts);?>
</table>
<div>
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
</div>
