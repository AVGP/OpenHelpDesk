<?php
class TicketsController extends AppController
{
    public $paginate = array('limit' => 10);

    function index()
    {
        $this->set('tickets',$this->paginate('Ticket'));
    }

    function show($id)
    {
        $this->Ticket->id = $id;
        $this->set('ticket',$this->Ticket->read());
    }

    
}
?>