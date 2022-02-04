<?php

class Dog
{

    private string $name;
    private string $sex;
    private array $parents;


    public function __construct(string $name, string $sex, ?array $parents = [])
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->parents = $parents;
    }

    public function getDogsName(): string
    {
        return $this->name;
    }

    public function hasParents(): bool
    {
        return !empty($this->parents);
    }


    public function fathersName()
    {
        return $this->parents[1];
    }

    public function mothersName()
    {
        if ($this->hasParents()) {
            return $this->parents[0];
        }
    }


}

class DogTest
{

    private array $dogs;

    public function addDogs(Dog $dog): Dog
    {
        return $this->dogs[] = $dog;
    }

    public function getAllDogs(): array
    {
        return $this->dogs;
    }

    public function printDogsInfo()
    {
        foreach ($this->getAllDogs() as $dog) {
            if ($dog->hasParents()) {
                echo "{$dog->getDogsName()}'s father is {$dog->fathersName()}" . PHP_EOL;
            } else {
                echo "{$dog->getDogsName()}'s father is unknown" . PHP_EOL;
            }

        }
    }

    public function hasTheSameMother(Dog $dogA, Dog $dogB): bool
    {

        if ($dogA->mothersName() === $dogB->mothersName()) {
            echo "{$dogA->getDogsName()} has the same mother as {$dogB->getDogsName()}" . PHP_EOL;
            return true;
        }
        return false;

    }


}


$a = new Dog('Max', 'male', ['Lady', 'Rocky']);
$b = new Dog('Rocky', 'male', ['Molly', 'Sam']);
$c = new Dog('Sparky', 'male');
$d = new Dog('Buster', 'male', ['Lady', 'Sparky']);
$e = new Dog('Sam', 'male');
$f = new Dog('Lady', 'female');
$g = new Dog('Molly', 'female');
$h = new Dog('Coco', 'female', ['Molly', 'Buster']);

$test = new DogTest();
$test->addDogs($a);
$test->addDogs($b);
$test->addDogs($c);
$test->addDogs($d);
$test->addDogs($e);
$test->addDogs($f);
$test->addDogs($g);
$test->addDogs($h);

$test->printDogsInfo();
echo '======' . PHP_EOL;
//TEST:
$test->hasTheSameMother($a, $d);
$test->hasTheSameMother($b, $d);


