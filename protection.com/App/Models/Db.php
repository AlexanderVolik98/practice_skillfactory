<?php 

namespace App\Models;
//пространство имен



use PDO;

        class Db {

                public $db;
                public function __construct($connect)
                        {
                                

                        $this->db = new PDO('mysql:host='.$connect['host'].';dbname='.$connect['name'].'; charset=utf8;', $connect['user'], $connect['password']); 
                     
                        }
                   

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

                