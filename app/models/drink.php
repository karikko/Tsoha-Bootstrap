<?php

  class Drink extends BaseModel{

    public $id, $ytunnus, $ktunnus, $raine, $jlaji, $ltyyppi, $nimi, $lpva, $vohje;

    public function validate_nimi(){
      $errors = array();
      if($this->nimi == '' || $this->nimi == null){
        $errors[] = 'Nimi ei saa olla tyhjä!';
      }
      if(strlen($this->nimi) < 3){
        $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä.';
      }
      return $errors;
    }

//    public function validate_jlaji(){
//      $errors = array();
//      if(this->jlaji == '' || $this->jlaji == null){
//        $errors[] = 'Valitse juomalaji!';
//      }
//      return $errors;
//    }

//    public function validate_ltyyppi(){
//      $errors = array();
//      if(this->ltyyppi == '' || $this->ltyyppi == null){
//        $errors[] = 'Valitse lasin malli!';
//      }
//      return $errors;
//    }

//    public function validate_raine(){
//      $errors = array();
//      if(this->raine == '' || $this->raine == null){
//        $errors[] = 'Valitse vähintään yksi raaka-aine!';
//      }
//      return $errors;
//    }

//    public function validate_vohje(){
//      $errors = array();
//      if(this->vohje == '' || $this->vohje == null){
//        $errors[] = 'Anna valmistusohjeet!';
//      }
//      return $errors;
//    }


    public function __construct($attributes){
      parent::__construct($attributes);
//    VALIDOINTIA VARTEN:
//    $this->validators = array(validate_nimi', 'validate_jlaji', 'validate_ltyyppi', 'validate_raine', 'validate_lpva', 'validate_vohje');
    }

    public static function all(){
      $query = DB::connection()->prepare('SELECT * FROM drinkkiohje');
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
     $query = DB::connection()->prepare('SELECT * FROM drinkkiohje WHERE id = :id LIMIT 1');
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
     $query = DB::connection()->prepare("INSERT INTO drinkkiohje(ytunnus, ktunnus, nimi, jlaji, ltyyppi, raine, lpva, vohje) VALUES (1, 1, :nimi, :jlaji, :ltyyppi, :raine, :lpva, :vohje) RETURNING id");
     $query->execute(array('nimi' => $this->nimi, 'jlaji' => $this->jlaji, 'ltyyppi' => $this->ltyyppi, 'raine' => $this->raine, 'lpva' => $this->lpva, 'vohje' => $this->vohje));     
     $row = $query->fetch();
//     Kint::trace();
//     Kint::dump($row);
     $this->id = $row['id'];
     }


 }

//   $screwdriver = new Drink(array('id' => 1, 'name' => 'Screwdriver', 'jlaji' => 'cocktail', 'ltyyppi' => 'highball', 'raine' => 'vodka, appelsiinimehu', 'lpva' => '28.3.2015' ,'vohje' => 'Kaada vodka ja appelsiinimehu jäillä täytettyyn lasiin.'));

//   echo $screwdriver->name;


?>
