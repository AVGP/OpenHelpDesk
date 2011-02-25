<?php
class Mailaccount extends AppModel
{
    public $hasMany = array(
        'Mail' => array('dependent' => false)
    );

    public $hasAndBelongsToMany = array(
        'Queue' => array('dependent' => true)
    );
}
?>