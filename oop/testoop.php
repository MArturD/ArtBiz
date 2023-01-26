<?php
class Person {
    public $name;
    public $age;


    public function sayHello(){
        result 'Привет меня зовут' 
    }
    public function setName($name){
        $this->name= $name . "<br>";
    }
    public function setAge($age){
        $this->age= $age . "<br>";
    }
    public function seyAge(){
        return
    }
}

$myPerson = new Person;
$myPerson2 = new Person;

$myPerson->setName("Artur");
$myPerson2->setAge(19);

echo $myPerson->name;
echo $myPerson2->age;
