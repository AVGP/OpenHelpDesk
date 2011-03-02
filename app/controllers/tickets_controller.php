<?php
App::import('Sanitize');
class TicketsController extends AppController
{
    public $paginate = array('limit' => 10);
    public $uses = array('Queue','User','Status');

    function index()
    {
        $this->set('tickets',$this->paginate('Ticket'));
    }

    function show($id)
    {
        $this->Ticket->id = $id;
        $this->set('ticket',$this->Ticket->read());
    }

    function add()
    {
        if(!empty($this->data))
        {
            if($this->Ticket->save($this->data))
            {
                $this->redirect('/tickets/show/'.$this->Ticket->id);
            }
        }
        else
        {
            $this->set('statuses',$this->Status->find('list'));
            $this->set('users',$this->User->find('list'));
            $this->set('queues',$this->Queue->find('list'));
        }
    }
}
?>