<h2>New ticket</h2>
<?php echo $form->create('Ticket'); ?>
<?php echo $form->input('subject',array('type' => 'text')); ?>
<?php echo $form->input('queue_id',  array('options' => $queues,   'label' => 'Queue')); ?>
<?php echo $form->input('status_id', array('options' => $statuses, 'label' => 'Initial state')); ?>
<?php echo $form->input('owner_id',  array('options' => $users,    'label' => 'Assign to')); ?>
<?php echo $form->end('Create ticket'); ?>