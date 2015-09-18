<?php

namespace KKiernan\Ups;

class TransactionReference
{
    use \KKiernan\Serializable;
    
    /**
     * @var string
     */
    protected $customerContext = 'Rating and Service';

    /**
     * @var string
     */
    protected $xpciVersion = '1.0';
}
