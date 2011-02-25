<?php 
class Ticket extends AppModel
{
    public $belongsTo = array('Queue','User','Status');
    public $hasMany   = array('Mail');
}
?>