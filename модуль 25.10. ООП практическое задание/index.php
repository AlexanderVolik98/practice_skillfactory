<?php

interface startEngine{
    public function startEngine();
}


interface stop{
    public function stop();
}


interface go{
    public function go();
}


interface action {

}

abstract class machine implements startEngine, stop, go, action
{
    public $model;
    public $color;
    public $year;
    public $izgotovitel;
   


        function __construct($color, $year, $model, $izgotovitel)
    {
       
        $this->color = $color;
        $this->year = $year;
        $this->$model = $model;
        $this->izgotovitel = $izgotovitel;
    }


 
    

    }

    

class action_and_go {

    static function move_and_action($machine) {

        $machine->go();

        $Mersenne_twister = 'action'.mt_rand(1,5);
      
        switch ($Mersenne_twister) {
            case 'action1':
               echo $machine->action1, '<br>';
                break;
                case 'action2':
                    echo $machine->action2, '<br>';
                     break;
                     case 'action3':
                        echo $machine->action3, '<br>';
                         break;
                         case 'action4';
                            echo $machine->action4, '<br>';
                             break;
                             case  'action5';
                                echo $machine->action5, '<br>';
                                 break;
                                                                           
        }
         }
}



class car extends machine {

    public $action1 = 'автомобиль заправляется';
    public $action2 = 'автомобиль разворачивается';
    public $action3 = 'автомобиль сигналит';
    public $action4 = 'автомобиль светит фарами';
    public $action5 = 'закись озота';


    public function startEngine()
    {
        echo "машина заведена". "<br>";
    }


    public function stop() 
    {
        echo "машина остановлена, мотор заглушен". "<br>";
    }

    public function action() {

    }
 

    public function go() 
    {
        echo "машина поехала". "<br>";
    }

}




class tank extends machine {


    public $action1 = 'танк стреляет!';
    public $action2 = 'танк заправляется';
    public $action3 = 'танк разворачивается';
    public $action4 = 'танк поворачивает башню';
    public $action5 = 'танк светит фарами';

    

public function startEngine()
{
    echo "танк заведен". '<br>';
}


public function stop() 
{
    echo "танк остановлен, мотор заглушен";
}

public function action() {

}



public function go() 
{
    echo "танк поехал". '<br>';
    
}


}


class bulldozer extends machine {


    public $action1 = 'бульдозер поднимает ковш';
    public $action2 = 'бульдозер роет землю';
    public $action3 = 'бульдозер разворачивается';
    public $action4 = 'бульдозер тянет другую машину';
    public $action5 = 'бульдозер пьёт кофе, потому что я не знаю чем ещё там занимаются бульдозеры';

    public function startEngine()
    {
        echo "бульдозер заведен",'<br>';
    }
    
    
    public function stop() 
    {
        echo "бульдозер остановлен, мотор заглушен";
    }
    

    public function go() 
    {
        echo "бульдозер поехал".'<br>';
        
    }


    public function action()
    {
        
    }
    
    
    }

$tank = new tank('зеленый', '1941','T34','uralmash');
$car = new car('синий', 2000,'ВАЗ 2107', 'ГАЗ');
$bulldozer = new bulldozer('желтый',2005,'BELARUS 2103','BELTRACT');




$tank->startEngine();
action_and_go::move_and_action($tank);

echo '<br>';

$bulldozer->startEngine();
action_and_go::move_and_action($bulldozer);

echo '<br>';

$car->startEngine();
action_and_go::move_and_action($car);


