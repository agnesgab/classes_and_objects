<?php

class Account
{

    private string $title;
    private float $balance;

    /**
     * @param string $title
     * @param float $balance
     */
    public function __construct(string $title, float $balance)
    {
        $this->title = $title;
        $this->balance = $balance;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public function getBalance(): float
    {
        return $this->balance;
    }

    public function deposit(float $money): float
    {
        $this->balance = $this->balance + $money;
        return $money;
    }

    public function withdraw(float $money): float
    {
        $this->balance = $this->balance - $money;
        return $money;
    }


}


echo PHP_EOL;
echo "BANK ACCOUNT" . PHP_EOL;

$title = readline('Account 1 title: ');
$balance = (float)readline('Enter balance: ');
$a = new Account($title, $balance);
echo PHP_EOL;
$title = readline('Account 2 title: ');
$balance = (float)readline('Enter balance: ');
$b = new Account($title, $balance);
echo PHP_EOL;
$howMuch = (float)readline('Enter transfer amount from account 1: ');
echo '-----------' . PHP_EOL;

//1.UZDEVUMS
//$b->deposit($a->withdraw($howMuch));
//echo "{$a->getTitle()}'s current balance: " . number_format($a->getBalance(), 2) . PHP_EOL;
//echo "{$b->getTitle()}'s current balance: " . number_format($b->getBalance(), 2) . PHP_EOL;


function transfer(Account $from, Account $to, int $howMuch)
{


    $to->deposit($from->withdraw($howMuch));


    $jointAccount = new Account('C', 0);
    $jointAccount->deposit($to->withdraw($howMuch / 2));

    echo "{$from->getTitle()}'s current balance: " . number_format($from->getBalance(), 2) . PHP_EOL;
    echo "{$to->getTitle()}'s current balance: " . number_format($to->getBalance(), 2) . PHP_EOL;
    echo "{$jointAccount->getTitle()}'s current balance: " . number_format($jointAccount->getBalance(), 2) . PHP_EOL;
}

//2.UZDEVUMS
transfer($a, $b, $howMuch);