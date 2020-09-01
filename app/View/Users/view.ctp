<div class="users view">
        <h2><?php echo __('User');?></h2>
        <dl>
                <dt><?php echo __('ID');?></dt>
                <dd><?php echo h($user['User']['id']); ?>&nbsp;</dd>
                <dt><?php echo __('Username');?></dt>
                <dd><?php echo h($user['User']['username']); ?>&nbsp;</dd>
                <dt><?php echo __('Password');?></dt>
                <dd><?php echo h($user['User']['password']); ?>&nbsp;</dd>
                <dt><?php echo __('Email');?></dt>
                <dd><?php echo h($user['User']['email']); ?>&nbsp;</dd>
                <dt><?php echo __('role');?></dt>
                <dd><?php echo h($user['User']['role']); ?>&nbsp;</dd>
                <dt><?php echo __('Created');?></dt>
                <dd><?php echo h($user['User']['created']); ?>&nbsp;</dd>
                <dt><?php echo __('Modified');?></dt>
                <dd><?php echo h($user['User']['modified']); ?>&nbsp;</dd>
        </dl>
</div>