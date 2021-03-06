<h2>Ticket Overview</h2>
<table>
    <thead>
        <tr>
            <th>Reporter</th>
            <th>Subject</th>
            <th>Submitted</th>
            <th>Status</th>
            <th>Assigned to</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($tickets as $t): ?>
        <tr>
            <td><?php echo Sanitize::html($t['Ticket']['reporter']); ?></td>
            <td><?php echo $html->link($t['Ticket']['subject'],'/tickets/show/'.$t['Ticket']['id']); ?></td>
            <td><?php echo date('d.m.Y H:i',$t['Ticket']['created']); ?></td>
            <td><?php echo $t['Status']['name']; ?></td>
            <td><?php echo (empty($t['User']['id']) ? 'unassigned' : $t['User']['username']); ?></td>
            <td>-</td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table> 
