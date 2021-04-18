<?php

use function PHPSTORM_META\type;

ini_set('display_errors', 1);
error_reporting(E_ERROR);


interface proc_with_goods {
    public function basket(array  $product, int $count, array $user);
    public function checkout($discount, $orderID, $userID);
}


interface getset {
    public function __get($key);
    public function __set($key, $value);
}


interface delivery_to_order {
    public function set_delivery();
    public function get_delivery();
}


class user {

    private $person = [];


     
    public function __set($key, $value)
    {
        $this->person[$key] = $value;
    }

    public function __get($key)
    {
        if(array_key_exists($key, $this->person))  return $this->person[$key];
        else return 'такой пользователь не найден';
            
    }

}


$user = new user;

$user->user1 = ['name' =>'alexey', 'address' => ['city' => 'Moscow', 'street' => 'Shipilovskaya 45', 'flat' => 'flat 34'],  'age' => 23, 'user_ID' => 1, 'phone' => '+79999999'];
$user->user2 = ['name' =>'dmitry', 'address' => ['city' => 'krasnoyarsk','street'=> 'Lenina 3', 'flat' => 33], 'age' => 30, 'user_ID' => 2, 'phone' => '+78888888'];


class products implements getset{
    
    private $technics = [];

    public function __set($key, $value)
    {
        $this->technics[$key] = $value;
    }
  
    public function __get($key)
    {
        if(array_key_exists($key, $this->technics))  return $this->technics[$key];
        else return 'такой товар не найден';
            
    }

}


$shop_store = new products;
$shop_store->laptop = ['name' => 'ноутбук Lenovo', 'count' => 50, 'price' => 30000];
$shop_store->mouse= ['name' => 'мышь MSI', 'count' => 150, 'price' => 500];
$shop_store->keyboard = ['name' => 'клавиатура HP мембранная', 'count' => 160, 'price' => 500];
$shop_store->monitor = ['name' => 'монитор LG', 'count' => 30, 'price' => 20000];
$shop_store->desktop = ['name' => 'компьютер DELL i5', 'count' => 20, 'price' => 50000];
$shop_store->cabel = ['name' => 'кабель HDMI мама папа', 'count' => 400, 'price' => 1000];


class discount extends products{
   private $discount = [];

    public function set_discount_product(string $name_discount, string $technics, int $val_discount, string $description, string $type_discount) {
        $this->discount[] = ['название акции' => $name_discount, 'товар' => $technics, 'размер скидки' => $val_discount, 'описание' => $description, 'тип расчета скидки' => $type_discount];
    }

    public function set_discount_delivery(string $name_discount, int $val_discount, string $description, string $type_discount) {
        $this->discount['discount_delivery'] = ['название акции' => $name_discount,  'размер скидки' => $val_discount, 'описание' => $description, 'тип расчета скидки' => $type_discount];
    }


    public function get_discount() {
       return($this->discount);
    }


    public function apply_discount_product($order, $discount) {

        $discount = $discount->get_discount();


        foreach ($order as $value) {
           

             for ($i=0; $i < count($discount); $i++) {
                
                if ($discount[$i]['товар'] === $value['наименование'] && $discount[$i]['тип расчета скидки'] === 'percent') {
        
                    $one_percent = $value['цена'] / 100;
                    $order['sum_discount'] +=  $sum_discount = ($one_percent * $discount[$i]['размер скидки']);
                   $value['цена'] -= $sum_discount;
              

                 for ($i=0; $i < count($order); $i++) { 
                    
                   if ($value['наименование'] == $order[$i]['наименование']) $order[$i]['цена'] -= $sum_discount;
   
                     }

                }
           
                elseif ($discount[$i]['товар'] === $value['наименование'] && $discount[$i]['тип расчета скидки'] === 'fix') { 

                    $order['sum_discount'] += $sum_discount = $discount[$i]['размер скидки'] * $value['количество'];
  
                   for ($i=0; $i < count($order); $i++) { 
  
                  if ($value['наименование'] == $order[$i]['наименование']) $order[$i]['цена'] -= $sum_discount;

                  
                    }
                   
                } 
             
            }
        
        }  
            
           
return $order;
      
    }

    public function apply_discount_delivery($total_amount) {
          
                if(!empty($this->discount['discount_delivery'])) {
                 

                   $one_percent = $total_amount / 100;
                   $total_with_discount =  $total_amount - $one_percent;
                   return $total_with_discount;

                        }
                else {
                    return $total_amount;
                }
    }
    
}


$new_discount = new discount;
$new_discount->set_discount_product('щедрый март', $shop_store->desktop['name'], 5, 'скидка пять процентов на товар по акции', 'percent');
$new_discount->set_discount_product('почти бесплатно', $shop_store->monitor['name'], 10, 'скидка десять процентов на оборудование с незначительными дефектами', 'percent');
$new_discount->set_discount_product('веселый апрель', $shop_store->cabel['name'], 200, 'скидка 200 рублей распродажа', 'fix');
$new_discount->set_discount_delivery('быстрее и дешевле', 1, 'скидка 1 процент за оформление доставки ', 'percent');


class shop implements proc_with_goods{

        private $basket = [];
        private $total_price;
        private $order = [];
        private $delivery = [];

  public function basket( array $product, int $count, array $user) {

        if($product['count'] !== 0) {
             
         $this->basket[] =  ['количество' => $count, 'наименование' => $product['name'],'цена' => $product['price'] * $count];
       
        $this->total_price += $product['price'] * $count;
      
    }

        else {
            $this->basket[] = ['товара больше нет на складе, заказ невозможен'];  
         
        }
        
  }


  public function checkout($discount, $order_ID, $user_ID) {
   
    $this->order = $this->basket;
  
    $this->order = $discount->apply_discount_product($this->order, $discount);
    $this->order['order_ID'] = $order_ID;
    $this->order['user_ID'] = $user_ID['user_ID'];
    $this->total_price = $this->total_price - $this->order['sum_discount'];
    $this->order['total_amount'] = ($this->total_price);
    $this->order['total_amount_discount_delivery'] = $discount->apply_discount_delivery($this->total_price);
  
    unset($this->basket);

    var_dump($this->order);
   
  }


  public function delivery (array $user, $preferred_date) {
 
    $order = $this->order;
    $delivery = $this->delivery;
    var_dump($preferred_date);
    var_dump($user['user_ID']);

  $delivery = ['customer_name' => $user['name'],
                'customer_phone' => $user['phone'],
                 'delivery_address' => $user['address']['city'],
                     'delivery_address' => $user['address']['city'].
                     ' '.$user['address']['street'].' '. $user['address']['flat'],
                      'order_ID' => $order['order_ID'],
                       'user_ID' => $user['user_ID'],
                        'delivery_date' => $preferred_date];
   var_dump($delivery);

   
   

  }



  
}   


$add_to_cart = new shop;

$add_to_cart->basket($shop_store->mouse, 2, $user->user2);
$add_to_cart->basket($shop_store->laptop, 1, $user->user2);
$add_to_cart->basket($shop_store->monitor, 1, $user->user2);
$add_to_cart->basket($shop_store->desktop, 2, $user->user2);
$add_to_cart->basket($shop_store->cabel, 3, $user->user2);
$add_to_cart->checkout($new_discount, 1, $user->user1);
$add_to_cart->delivery($user->user1, '2021-04-20 14:00');


?>