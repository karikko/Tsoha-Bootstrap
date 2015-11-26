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

 $routes->get('/drinklist/:id/edit', function($id){
    DrinkListController::edit($id);
  });

 $routes->post('/drinklist/:id/edit', function($id){
    DrinkListController::update($id);
  });

 $routes->post('/drinklist/:id/destroy', function($id){
    DrinkListController::destroy($id);
  });

 $routes->get('/login', function(){
   // Kirjautumislomakkeen esittäminen
   UserController::login(); 
 });
 $routes->post('/login', function(){
   // Kirjautumisen käsittely
   UserController::handle_login();
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
