<?php
class Mail extends AppModel
{
    public $belongsTo = array('Mailaccount','Ticket');
}
?>