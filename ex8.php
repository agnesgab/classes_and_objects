<?php

class SavingsAccount
{

    private float $startingBalance;
    private float $annualInterestRate;


    public function __construct(int $startingBalance, int $annualInterestRate, int $periodInMonths)
    {
        $this->startingBalance = $startingBalance;
        $this->annualInterestRate = $annualInterestRate;
        $this->periodInMonths = $periodInMonths;
    }

    public function withdraw($withdrawal):void
    {

        $this->startingBalance -= $withdrawal;

    }

    public function deposit($deposit):float
    {
        return $this->startingBalance += $deposit;
    }

    public function getMonthlyInterest(): float
    {
        return $this->annualInterestRate / 12 * 0.01;
    }


    public function getBalance():float
    {
        return $this->startingBalance;
    }



}



$balance = (float)readline('How much money is in the account?: ');
$interestRate = (float)readline('Enter the annual interest rate: ');
$months = (int)readline('How long has the account been opened? ');

$account = new SavingsAccount($balance, $interestRate, $months);
$totalDeposited = 0;
$totalWithdrawn = 0;
$totalInterestEarned = 0;
$total = 0;
$currentBalance = $account->getBalance();
$rate = $account->getMonthlyInterest();


for ($i = 1; $i <= $months; $i++) {

    echo "Enter amount deposited for $i:";
    $deposit = (float)readline(' ');
    $account->deposit($deposit);
    $totalDeposited += $deposit;
    echo PHP_EOL;

    echo "Enter amount withdrawn for $i:";
    $withdrawal = (float)readline(' ');
    $account->withdraw($withdrawal);
    $totalWithdrawn += $withdrawal;
    echo PHP_EOL;

    //currentBalance bez %
    $currentBalance += $deposit - $withdrawal;

    $interest = $currentBalance * $rate;
    $totalInterestEarned += $interest;

    //currentBalance ar %
    $currentBalance += $interest;



}

$total = ($balance + $totalDeposited - $totalWithdrawn) + $totalInterestEarned;

echo "Total deposited: $" . $totalDeposited . PHP_EOL;
echo "Total withdrawn: $" . $totalWithdrawn . PHP_EOL;
echo "Interest earned: $" . number_format($totalInterestEarned, 2) . PHP_EOL;
echo "Ending balance: $" . number_format($total, 2) . PHP_EOL;



