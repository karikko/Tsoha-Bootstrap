<?php

  require 'app/models/drink.php';

class DrinkListController extends BaseController{

  public static function index(){
    $drinks = Drink::all();
    View::make('drinklist/list.html', array('drinks' => $drinks));
  }

  public static function create(){
    View::make('drinklist/new.html');
  }

  public static function store(){
    $params = $_POST;
    $drink = new Drink(array(
      'nimi' => $params['nimi'],
      'jlaji' => 1,
      'ltyyppi' => 1,
      'raine' => 1,
      'lpva' => $params['lpva'],
      'vohje' => $params['vohje'],
      ));

//    Kint::dump($params);

    $drink->save();

    Redirect::to('/drinklist/' . $drink->id, array('message' => 'Juomaehdotuksesi on otettu vastaan.'));
  }

  public static function show(){
  View::make('/drinklist/drink_show.html');
  $drink->find($id);

  }

}


?>
