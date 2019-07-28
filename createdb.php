<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('score.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
   $sql ='DROP TABLE IF EXISTS score';
   $ret = $db->exec($sql);   

   $sql ='CREATE TABLE score(id INTEGER PRIMARY KEY, name TEXT, creativity1 INT, creativity2 INT, creativity3 INT, entertainment1 INT, entertainment2 INT, entertainment3 INT, aesthetic1 INT, aesthetic2 INT, aesthetic3 INT, teamwork1 INT, teamwork2 INT, teamwork3 INT, final INT)';

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }

   $ret = $db->exec('INSERT INTO score (name) VALUES ("Xishan Cub Scout Group Team 1")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Cantonment Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Casuarina Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Catholic High Scout Group Team 1")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Catholic High Scout Group Team 2")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Colugo Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("De La Salle Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Endeavour Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("First Toa Payoh Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Gan Eng Seng Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Horizon Cub Scout Group Team 1")');   
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Horizon Cub Scout Group Team 2")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Kheng Cheng School")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Meridian Cub Scout Group Team 1")');   
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Meridian Cub Scout Group Team 2")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Northland Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Punggol Green Cub Scout Group")');   
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Radin Mas Dragon Cub Scout Group")');   
   $ret = $db->exec('INSERT INTO score (name) VALUES ("River Valley Raven Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Rosyth Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Seng Kang Green Cub Scout Group")');   
   $ret = $db->exec('INSERT INTO score (name) VALUES ("SJI ( Junior ) Cub Scout Group")');   
   $ret = $db->exec('INSERT INTO score (name) VALUES ("St. Anthony’s Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Telok Kurau Cub Scout Group Team 1")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Telok Kurau Cub Scout Group Team 2")');   
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Temasek Cub Scout Group")');   
   $ret = $db->exec('INSERT INTO score (name) VALUES ("White Sands Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Woodlands Manta Ray Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Xishan Cub Scout Group Team 2")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("Jing Shan Cub Scout Group")');
   $ret = $db->exec('INSERT INTO score (name) VALUES ("South View Cub Scout Group")');

   $db->close();
?>
