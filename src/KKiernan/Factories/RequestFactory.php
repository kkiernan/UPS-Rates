<?php

namespace KKiernan\Factories;

use KKiernan\Ups\Request;
use KKiernan\Ups\TransactionReference;

class RequestFactory
{
    /**
     * Creates a new request instance.
     * 
     * @return \KKiernan\Ups\Request
     */
    public static function create()
    {
        return new Request(new TransactionReference());
    }
}
