<h2>Ticket Overview</h2>
<table>
    <thead>
        <tr>
            <th>Reporter</th>
            <th>Subject</th>
            <th>Submitted</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($tickets as $t): ?>
        <tr>
            <td><?php echo $t['Ticket']['reporter']; ?></td>
            <td><?php echo $t['Ticket']['subject']; ?></td>
            <td><?php echo date('d.m.Y H:i',$t['Ticket']['created']); ?></td>
            <td><?php echo $t['Status']['name']; ?></td>
            <td>-</td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table> 
