<?php

interface DBConnection {
  public function connect();
  public function executeQuery();
  public function disconnect();
}

class MySQLConnection implements DBConnection {

}

class PostgresConnection implements DBConnection {

}

class Connection implements DBConnection {

}

