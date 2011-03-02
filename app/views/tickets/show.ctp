<h2>#<?php echo $ticket['Ticket']['id'].' - '.$ticket['Ticket']['subject']; ?></h2>
<div id="metainfo">
    <div>Created: <?php echo date('d.m.Y H:i',$ticket['Ticket']['created']); ?></div>
    <div>From: <?php echo htmlentities($ticket['Ticket']['reporter']); ?></div>
<?php if(!empty($ticket['User']['username'])): ?>
    <div>Belongs to <?php echo $ticket['User']['username']; ?></div>
<?php else: ?>
    <div>This ticket is unassigned. <?php echo $html->link('Assign to me','/tickets/assign/'.$ticket['Ticket']['id'].'/0'); ?></div>
<?php endif; ?>
    <div>Status is <span class="large highlight attentionwhore"><?php echo $ticket['Status']['name']; ?></span></div>
</div>
<div id="conversation">
<?php foreach($ticket['Mail'] as $mail): ?>
    <div class="mailcontainer">
        <p>From: <?php echo htmlentities($mail['sender']); ?></p>
        <h3>&quot;<?php echo $mail['subject']; ?>&quot;</h3>
        <p>on <?php echo date('d.m.Y H:i',$mail['timestamp']); ?></p>
        <div>
            <?php echo Sanitize::html($mail['message'],array('remove' => true)); ?>
        </div>
    </div>
<?php endforeach; ?>
</div>
