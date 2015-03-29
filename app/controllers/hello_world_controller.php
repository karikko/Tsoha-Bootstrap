<?php

  require 'app/models/drink.php';
//  require 'app/models/game.php';

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
     View::make('suunnitelmat/index.html');
    }

    public static function sandbox(){
//      View::make ('helloworld.html');
      $screwdriver = Drink::find(1);
      $drinks = Drink::all();
      Kint::dump($drinks);
      Kint::dump($screwdriver);
//        $skyrim = Game::find(1);
//        $homm = Game::find(2);
//       $games = Game::all();

        // Kint-luokan dump-metodi tulostaa muuttujan arvon
//        Kint::dump($skyrim);
//        Kint::dump($homm);
//        Kint::dump($games);
        // Testaa koodiasi täällä
    }

    public static function drink_list(){
    View::make('suunnitelmat/drink_list.html');
    }

    public static function drink_show(){
    View::make('suunnitelmat/drink_show.html');
    }

    public static function drink_edit(){
    View::make('suunnitelmat/drink_edit.html');
    }

  }
