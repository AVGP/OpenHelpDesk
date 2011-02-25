<?php
class MailShell extends Shell
{
    public $uses = array('Mailaccount','Mail','Ticket');

    function main()
    {
        $accounts = $this->Mailaccount->find('all');
        foreach($accounts as $mailAcc)
        {
            //IMAP stuff
            $mailAcc = $mailAcc['Mailaccount'];
            $imapConnection = imap_open(
                '{'.$mailAcc['host'].':'.$mailAcc['port'].'/imap/ssl/novalidate-cert}'.
                    $mailAcc['folder'],
                $mailAcc['username'],
                $mailAcc['password'])
                    or die('Cannot connect to IMAP Server ('.
                        '{'.$mailAcc['host'].':'.$mailAcc['port'].'/imap/ssl/novalidate-cert}'.
                        $mailAcc['folder'].')');
            $mails = imap_search($imapConnection,'UNSEEN');

            foreach($mails as $m)
            {
                $mailHead = imap_fetch_overview($imapConnection,$m);
                $mailBody = imap_fetchbody($imapConnection,$m,2);

                if(stripos($mailHead[0]->subject,'[TICKET #') === FALSE) //No previous ticket there. Need to create one.
                {
                    $data = array('Ticket' => array(
                        'subject'  => $mailHead[0]->subject,
                        'reporter' => $mailHead[0]->from,
                        'created'  => time()
                    ));
                    if($this->Ticket->save($data)) $ticketId = $this->Ticket->id;
                    else die('Cannot save Ticket');
                }
                else
                {
                    preg_match('@\[TICKET #(\d+)\]@i',$mailHead[0]->subject,$matches);
                    $ticketId = $matches[1];
                }
                
                $this->Mail->create();
                $data = array('Mail' => array(
                    'subject'        => $mailHead[0]->subject,
                    'sender'         => $mailHead[0]->from,
                    'timestamp'      => time(),
                    'message'        => $mailBody,
                    'ticket_id'      => $ticketId,
                    'mailaccount_id' => $mailAcc['id']
                ));
                if(!$this->Mail->save($data)) echo 'WARNING: Could not process mail!';
            }
        }
        echo 'Done.';
    }
}
?> 
