<?php

class BankAccount {

    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;

    }

    public function getName():string{
        return $this->name;
    }

    public function getBalance(): float{
        return $this->balance;
    }


    public function showUserNameAndBalance():string{
        if($this->getBalance() > 0) {
            return $this->getName() . ', $' . number_format($this->getBalance(), 2) . PHP_EOL;
        } else {
            return $this->getName() . ', -$' . number_format(abs($this->getBalance()), 2) . PHP_EOL;
        }
    }
}

$name = readline('Enter name: ');
$balance = (float) readline('Enter balance: ');
$account = new BankAccount($name, $balance);
echo $account->showUserNameAndBalance();