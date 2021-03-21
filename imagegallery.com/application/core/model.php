<?php

namespace application\core;

use application\models\db;

abstract class model {     
 
    public $db;

    public function __construct()
    {
  
        $this->db = new db;

    }


}


