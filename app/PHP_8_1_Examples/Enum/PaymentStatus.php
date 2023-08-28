<?php

declare(strict_types = 1);

namespace App\PHP_8_1_Examples\Enum;


enum PaymentStatus
{
    case PAID;
    case VOID;
    case DECLINE;
    
    public function text():string
    {

        return match($this){
            self::PAID => 'Paid',
            self::VOID => 'Paid',
            self::DECLINE => 'Paid',

        };
    }
}