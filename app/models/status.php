<?php 
class Status extends AppModel
{
    public $hasMany = array('Ticket' => array('dependent' => false));
}
?>