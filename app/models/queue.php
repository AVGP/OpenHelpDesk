<?php
class Queue extends AppModel
{
    public $hasMany = array('Ticket' => array('dependent' => false));
    public $hasAndBelongsToMany = array('Mailaccount');
}
?>