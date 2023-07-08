<?php
// namespace App\Models;

// use \PDO;
// use App\Utils\Database;

// class Team {
//     private $id;
//     private $name;
//     private $manufacturer;

//     public static function findAll()
//     {
//         $pdo = Database::getPDO();

//         $sql = 'SELECT *
//                     FROM teams';

//         $pdoStatement = $pdo->query($sql);

//         $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\Team');

//         return $results;
//     }

//     /**
//      * Get the value of id
//      */ 
//     public function getId()
//     {
//         return $this->id;
//     }

//     /**
//      * Get the value of name
//      */ 
//     public function getName()
//     {
//         return $this->name;
//     }

//     /**
//      * Set the value of name
//      *
//      * @return  self
//      */ 
//     public function setName($name)
//     {
//         $this->name = $name;

//         return $this;
//     }

//     /**
//      * Get the value of manufacturer
//      */ 
//     public function getManufacturer()
//     {
//         return $this->manufacturer;
//     }

//     /**
//      * Set the value of manufacturer
//      *
//      * @return  self
//      */ 
//     public function setManufacturer($manufacturer)
//     {
//         $this->manufacturer = $manufacturer;

//         return $this;
//     }
// }