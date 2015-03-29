<?php

  class Drink extends BaseModel{

    public $id, $ytunnus, $ktunnus, $raine, $jlaji, $ltyyppi, $nimi, $lpva, $vohje;

    public function __construct($attributes){
      parent::__construct($attributes);
    }

    public static function all(){
      $query = DB::connection()->prepare('SELECT * FROM Drink');
      $query->execute();
      $rows = $query->fetchAll();
      $drinks = array();

      foreach($rows as $row){
        $drinks[] = new Drink(array(
          'id' => $row['id'],
          'ytunnus' => $row['ytunnus'],
          'ktunnus' => $row['ktunnus'],
          'raine' => $row['raine'],
          'jlaji' => $row['jlaji'],
          'ltyyppi' => $row['ltyyppi'],
          'nimi' => $row['nimi'],
          'lpva' => $row['lpva'],
          'vohje' => $row['vohje'],
        ));
      }

   return $drinks;
   }

   public static function find($id){
     $query = DB::connection()->prepare('SELECT * FROM Drink WHERE id = :id LIMIT 1');
     $query -> execute(array('id' => $id));
     $row = $query->fetch();

     if($row){
       $drink = new Drink(array(
         'id' => $row['id'],
         'ytunnus' => $row['ytunnus'],
         'ktunnus' => $row['ktunnus'],
         'raine' => $row['raine'],
         'jlaji' => $row['jlaji'],
         'ltyyppi' => $row['ltyyppi'],
         'nimi' => $row['nimi'],
         'lpva' => $row['lpva'],
         'vohje' => $row['vohje'],
        ));
       return $drink;
     }

     return null;
     }

     public function save(){
     $query = DB::connection()->prepare('INSERT INTO Drink(nimi, jlaji, ltyyppi, raine, lpva, vohje) VALUES (:nimi, :jlaji, :ltyyppi, :raine, :lpva, :vohje) RETURNING id');
     $query->execute(array('nimi' => $this->nimi, 'jlaji' => $this->jlaji, 'ltyyppi' => $this->ltyyppi, 'raine' => $this->raine, 'lpva' => $this->lpva, 'vohje' => $this->vohje));
     $row = $query->fetch();
     Kint::trace();
     Kint::dump($row);
//     $this->id = $row['id'];
     }


 }

   $screwdriver = new Drink(array('id' => 1, 'name' => 'Screwdriver', 'jlaji' => 'cocktail', 'ltyyppi' => 'highball', 'raine' => 'vodka, appelsiinimehu', 'lpva' => '28.3.2015' ,'vohje' => 'Kaada vodka ja appelsiinimehu jäillä täytettyyn lasiin.'));

//   echo $screwdriver->name;


?>
