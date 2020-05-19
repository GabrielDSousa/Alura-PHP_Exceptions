<?php


namespace GabsDSousa\Bank\Model;

use DomainException;

class NameLengthException extends DomainException
{
    public function __construct($message = "The name need to have at minimum 5 characters")
    {
        parent::__construct($message);
    }
}