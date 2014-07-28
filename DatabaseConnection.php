<?php
/**
 * DatabaseConnection
 * 
 * Here configuaration parameters are set up directly although 
 * the best way to load the connection from seperate settings file. 
 *
 */
class DatabaseConnection {
  private $hostname = 'localhost';
  private $user = 'cs_user';
  private $password = 'I!a@g#t4h';
  private $databaseName = 'commentsystem';

  public function __construct() {
    mysql_connect($this->hostname, $this->user, $this->password) or die('Could not connect!');
    mysql_select_db($this->databaseName) or die('Could not select DB.');
  }
}
