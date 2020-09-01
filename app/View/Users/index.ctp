<div class="users index">
    <h2><?php echo __('Users')?></h2>
    <?php
    echo $this->Form->create(null,['type'=>'get']);
    echo $this->Form->input('key',['label'=>'Search','value'=>$this->request->query('key')]);
    echo $this->Form->end('Submit');
    ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id');?></th>
                <th><?php echo $this->Paginator->sort('username');?></th>
                <th><?php echo $this->Paginator->sort('password');?></th>
                <th><?php echo $this->Paginator->sort('email');?></th>
                <th><?php echo $this->Paginator->sort('role');?></th>
                <th><?php echo $this->Paginator->sort('created');?></th>
                <th><?php echo $this->Paginator->sort('modified');?></th>
                <th class="actions"><?php echo __('Actions');?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user) : ?>
            <tr>
                <td><?php echo h($user['User']['id']);?>&nbsp;</td>
                <td><?php echo h($user['User']['username']);?>&nbsp;</td>
                <td><?php echo h($user['User']['password']);?>&nbsp;</td>
                <td><?php echo h($user['User']['email']);?>&nbsp;</td>
                <td><?php echo h($user['User']['role']);?>&nbsp;</td>
                <td><?php echo h($user['User']['created']);?>&nbsp;</td>
                <td><?php echo h($user['User']['modified']);?>&nbsp;</td>
                <td class='actions'>
                    <?php echo $this->HTML->link(__('View'),array('action'=>'view',$user['User']['id']));?>
                    <?php echo $this->HTML->link(__('Edit'),array('action'=>'edit',$user['User']['id']));?>
                    <?php echo $this->Form->postLink(__('Delete'),array('action'=>'delete',$user['User']['id']),array(),__('Are you sure you want to delete # %s?',$user['User']['id']));?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
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
</div>
