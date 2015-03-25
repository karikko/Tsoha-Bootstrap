<?php

  class Drink extends BaseModel{

    public $id, $ytunnus, $raine, $jtyyppi, $ltyyppi, $name, $lpva, $vohje; 

    public function __construct($attributes){
      parent::__construct($attributes);
  }
}

   $screwdriver = new Drink(array('id' => 1, 'name' => 'Screwdriver', $vohje => 'Kaada vodka ja appelsiinimehu jäillä täytettyyn lasiin.'));

   echo $screwdriver->name;

   public static function all(){
     $query = DB::connection()->prepare('SELECT * FROM Drink');
     $query->execute();
     $rows = $query->fetchAll();
     $drinks = array();

     foreach($rows as $row){
       $drinks[] = new Drink(array(
         'id' => $row['id'],
         'ytunnus' => $row['ytunnus'],
         'raine' => $row['raine'],
         'jtyyppi' => $row['jtyyppi'],
         'ltyyppi' => $row['ltyyppi'],
         'name' => $row['name'], 
         'lpva' => $row['lpva'],
         'vohje' => $row['vohje'],
     ));
   }
   
   return $drinks;
   }
}
?>
