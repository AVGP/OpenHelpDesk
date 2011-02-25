<?php 
class Ticket extends AppModel
{
    public $belongsTo = array('Queue','Status',
        'User' => array('foreignKey' => 'owner_id'
    ));
    public $hasMany   = array('Mail');
}
?>