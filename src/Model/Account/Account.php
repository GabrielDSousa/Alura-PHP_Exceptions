<?php
namespace GabsDSousa\Bank\Model\Account;

use InvalidArgumentException;

abstract class Account
{
    private Holder $holder;
    private float $balance;
    private static int $accountCount = 0;

    public function __construct(Holder $holder)
    {
        $this->holder = $holder;
        $this->balance = 0;
        self::$accountCount++;
    }

    public function __destruct()
    {
        self::$accountCount--;
    }

    public static function getAccountCount(): int
    {
        return self::$accountCount;
    }

    public function withdraw(float $value): void
    {
        $value += ($value * $this->tax());
        if ($value > $this->balance) {
            throw new InsufficientBalanceException($this->balance);
        }

        $this->balance -= $value;
    }

    public function deposit(float $value): void
    {
        if ($value < 0) {
            throw new InvalidArgumentException("Value of deposit invalid");
        }

        $this->balance += $value;
    }

    public function getHolder(): Holder
    {
        return $this->holder;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    abstract public function tax(): float;
}