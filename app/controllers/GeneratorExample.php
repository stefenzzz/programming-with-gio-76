<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\{View, App, Container};
use App\Services\InvoiceService;
use App\Models\{Ticket};

// use PDO;
// use App\Models\{User,Invoice,SignUp};

class GeneratorExample
{

    public function __construct(private Ticket $ticketmodel)
    {
       
       
        foreach($this->ticketmodel->all() as $ticket){

            echo $ticket['id']. ' '.$ticket['title']. PHP_EOL;
        }
    }
    public function index()
    {   

        
    }

}