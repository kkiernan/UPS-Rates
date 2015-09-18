<?php

namespace KKiernan\Ups;

class Request
{
    use \KKiernan\Serializable;

    /**
     * @var TransactionReference
     */
    protected $transactionReference;

    /**
     * @var string
     */
    protected $requestAction;

    /**
     * @var string
     */
    protected $requestOption;

    /**
     * Creates a new request instance.
     * 
     * @param TransactionReference $transactionReference
     * @param string               $requestAction
     * @param string               $requestOption
     */
    public function __construct(TransactionReference $transactionReference, $requestAction = 'Rate', $requestOption = 'Rate')
    {
        $this->transactionReference = $transactionReference;
        $this->requestAction = $requestAction;
        $this->requestOption = $requestOption;
    }
}
