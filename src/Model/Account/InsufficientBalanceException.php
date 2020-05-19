<?php


namespace GabsDSousa\Bank\Model\Account;

use DomainException;

class InsufficientBalanceException extends DomainException
{
    public function __construct(float $amount)
    {
        $message = "You balance is: $amount, your transaction exceeds this value";
        parent::__construct($message);
    }
}