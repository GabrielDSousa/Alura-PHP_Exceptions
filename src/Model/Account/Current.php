<?php


namespace GabsDSousa\Bank\Model\Account;

use InvalidArgumentException;

class Current extends Account
{

    public function tax(): float
    {
        return 0.05;
    }

    public function transfer(float $value, Account $destination): void
    {
        if ($value < 0) {
            throw new InvalidArgumentException("Value of transfer invalid");
        }

        if ($value > $this->getBalance()) {
            throw new InsufficientBalanceException($this->getBalance());
        }

        try{
            $this->withdraw($value);
            $destination->deposit($value);
        }catch (InsufficientBalanceException $exception){
            throw new InsufficientBalanceException($this->getBalance());
        }


    }
}