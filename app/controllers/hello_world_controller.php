<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
     View::make('suunnitelmat/index.html');
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make ('helloworld.html');
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
