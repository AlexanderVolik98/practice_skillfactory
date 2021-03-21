<?php 

namespace application\models;
//пространство имен


use PDO;
//задаем что мы используем в этой программе класс pdo


        class db {

                protected $db;
                public function __construct()
                        {
                                $db_route = require 'application/config/db.php';

                                $this->db =  new PDO('mysql:host='.$db_route['host'].';dbname='.$db_route['name'].'; charset=utf8;', $db_route['user'], $db_route['password']); 
                        //далее пишем наше подключение, код не сработал так как я не указал кодировку, необходимо при подключении указывать кодировку для подключения
                     
                        }
                        //construct функция будет срабатывать каждый раз, когда мы объявляем экземпляр данного класса



                        public function query($sql) {
                              $query = $this->db->query($sql);
                                return $query;
                              
                        }



                        public function row($sql) {
                                $result = $this->query($sql);
                                return $result->fetchAll(PDO::FETCH_ASSOC);
                        }


                        public function column($sql) {
                                $result = $this->query($sql);
                                return $result->fetchColumn();
                        }
                }


