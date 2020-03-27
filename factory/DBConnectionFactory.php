<?php

class DBConnectionFactory {

/** @returns DBConnection **/
  public function getConnection(string $driverName) {
    # create database connection based on driver
    return $dbConnection;
  }
}

class App {

  public function __construct(DBConnection $dbConnection){
      $this->dbConnection = $dbConnection

  }

  public function executeQuery($query){
      $this->dbConnection->connect();
      $this->dbConnection->executeQuery($query);
      $this->dbConnection->disconnect();
  }

}

$connectionFactory = new DBConnectionFactory();

$connection =$connectionFactory->getConnection('mysql');

$context = new App($connection);

$context->executeQuery('SELECT * from design_patterns');

