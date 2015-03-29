<?php

  require 'app/models/drink.php';

class DrinkListController extends BaseController{

  public static function index(){
    $drinks = Drink::all();
    View::make('drinklist/drink_list.html', array('drinks' => $drinks));
  }

  public static function store(){
    $params = $_POST;
    $drink = new Drink(array(
      'nimi' => $params['nimi'],
      'jlaji' => $params['jlaji'],
      'ltyyppi' => $params['ltyyppi'],
      'raine' => $params['raine'],
      'lpva' => $params['lpva'],
      'vohje' => $params['vohje'],
      ));

    Kint::dump($params);

    $drink->save();

//    Redirect::to('drinklist/ . $drink->id, array('message' => 'Juomaehdotuksesi on otettu vastaan.'));
  }

//  public function save(){
//    $query = DB::connection()->prepare('INSERT INTO Drink (nimi, jlaji, ltyyppi, raine, lpva, vohje) VALUES (:nimi, :jlaji, :ltyyppi, :raine, :lpva, :vohje) RETURNING id');
//    $query->execute(array('nimi' => $this->nimi, 'jlaji' => $this->jlaji, 'ltyyppi' => $this->ltyyppi, 'raine' => $this->raine, 'lpva' => $this->lpva, 'vohje' => $this->vohje));
//    $row = $query->fetch();
//    $this->id = $row['id'];
//  }
}


?>
