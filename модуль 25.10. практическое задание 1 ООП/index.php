<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php




class family{
    public $peoplecount = 3;
  


    function getInfo() {
        return "семья состоит из {$this->peoplecount} человек";
    }

}


$familyOne = new family;

echo $familyOne->getInfo();

var_dump($familyOne);



abstract class members extends family{

protected $surname = "Ивановых";
protected $city = "Москва";
protected $district = "Павелецкая 23к4 кв. 173";
protected $character = "спокойный";


    abstract public function get_info();
    abstract public function rest();

    final public function sleep () {
        $this->name = "zzz...";
        echo $this->name;    
    }
    

    
}













class father extends members  {

    public $wife;

    function __construct($age,$name,$profession)
    {
        $this->age = $age;
        $this->name = $name;
        $this->profession = $profession;
    
    }


    public function work () {
        $this->name = "working";
        echo $this->name;
    }


    public function rest () {
        $this->name = "watching TV";
        echo $this->name;
    }
   
    public function get_info() {
        return "мужчине "."{$this->age}" ."лет, "."его зовут ". "{$this->name} " . "он из семьи {$this->surname}" ." профессия "."{$this->profession}" . " проживает в городе " . 
        "{$this->city}"." по адресу {$this->district}";
    }

}


$man = new father("26 "," Алексей"," инженер");

echo $man->get_info();

var_dump($man);











class mother extends members {

    public $husband;

    function __construct($age,$name,$profession)
    {
        $this->age = $age;
        $this->name = $name;
        $this->profession = $profession;
  
    }


    public function rest () {
        $this->name = "reading books";
        echo $this->name;
    }

    public function work () {
        $this->name = "working";
        echo $this->name;
    }
  
    public function get_info() {
        return "женщине "."{$this->age}" ."лет, "."ее зовут ". "{$this->name} она из семьи {$this->surname}" ." профессия "."{$this->profession}" . " проживает в городе" . 
        " {$this->city}"." по адресу {$this->district}";
    }



}



$women = new mother("25 "," Елена"," менеджер");

echo $women->get_info();

var_dump($women);








class child extends members {

    function __construct($age,$sex,$name,$place_of_study)
    {
        $this->sex = $sex;
        $this->age = $age;
        $this->name = $name;
        $this->place_of_study = $place_of_study;
    }

    public function rest () {
        $this->name = "playing computer games";
        echo $this->name;
    }

    public function learns() {
        $this->name = "solves exercises";
        echo $this->name;
    }



    public function get_info() {
        return "{$this->sex} "."{$this->age} " ."лет, "." зовут ". "{$this->name} " . "из семьи {$this->surname}" .", учится в "."{$this->place_of_study}" . ", проживает в городе " . 
        " {$this->city}"." по адресу {$this->district} характер как и у родителей - {$this->character}";
    }




}


$newchild = new child(12,"девочка","Алина","школе");

echo $newchild->get_info();


var_dump($newchild);





?>



</body> 
</html>

