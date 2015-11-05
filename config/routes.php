<?php

  $routes->get('/', function(){
    HelloWorldController::index();
  });

  $routes->get('/drinklist', function(){
    DrinkListController::index();
  });

  $routes->post('/drinklist', function(){
    DrinkListController::store();
  });

  $routes->get('/drinklist/new', function(){
    DrinkListController::create();
  });


// NÄMÄ VIELÄ TYÖN ALLA

  $routes->get('/drinklist/:id', function($id){
    DrinkListController::show($id);
  });


//------TESTISIVUT----->

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/drink', function() {
    HelloWorldController::drink_list();
  });

  $routes->get('/drink/1', function() {
    HelloWorldController::drink_show();
  });

  $routes->get('/edit', function() {
    HelloWorldController::drink_edit();
  });

?>
