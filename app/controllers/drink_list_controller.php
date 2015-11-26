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
//    $drink = new Drink(array(
    $attributes = array(
      'nimi' => $params['nimi'],
      'jlaji' => 1,
      'ltyyppi' => 1,
      'raine' => 1,
      'lpva' => $params['lpva'],
      'vohje' => $params['vohje'],
      );

      $drink = new Drink($attributes);
      $errors = $drink->errors();

      if(count($errors) == 0){
        $drink->save();

        Redirect::to('/drinklist/' . $drink->id, array('message' => 'Juomaehdotuksesi on otettu vastaan.'));
      }else{
        View::make('drinklist/new.html' array('errors' => $errors, 'attributes' =>$attributes));
      }
    }


//     'nimi' => $params['nimi'],
//      'jlaji' => 1,
//      'ltyyppi' => 1,
//      'raine' => 1,
//      'lpva' => $params['lpva'],
//      'vohje' => $params['vohje'],
//      ));


//    Kint::dump($params);

//    $drink->save();

//    Redirect::to('/drinklist/' . $drink->id, array('message' => 'Juomaehdotuksesi on otettu vastaan.'));
//  }

  public static function show(){
  View::make('/drinklist/drink_show.html');
  $drink->find($id);

  }
  
  public static function edit($id){
    $drink = Drink::find($id);
    View::make('drinklist/edit.html', array ('attributes' => $drink));
  }

  public static function update($id){
    $params = $_POST;

    $attributes = array{
      'id' => $id,
      'nimi' => $params['name'],
      'jlaji' => 1,
      'ltyyppi' => 1,
      'raine' => 1,
      'lpva' => $params['lpva'],
      'vohje' => $params['vohje']
    };
  
    $drink = new Drink($attributes);
    $errors = $drink->errors();

    if(count($errors) > 0){
      View::make('drinklist/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      $drink->update();
      Redirect::to('/drinklist/' . $drink->id, array('message' => 'Juomaa on muokattu onnistuneesti.));
    }
  }
 
  public static function destroy($id){
    $drink = new Drink(array('id' => $id));
    $drink->destroy();
    Redirect::to('drinklist', array('message' => 'Juoma on poistettu onnistuneesti.'));
  }

}


?>
