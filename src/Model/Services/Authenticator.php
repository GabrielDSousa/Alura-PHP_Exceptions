<?php


namespace GabsDSousa\Bank\Model\Services;


use GabsDSousa\Bank\Model\Authentic;
use InvalidArgumentException;

class Authenticator
{
    public function login(Authentic $authentic, string $password): void
    {
        if (!$authentic->auth($password)) {
            throw new InvalidArgumentException("Wrong password");
        }
    }
}