<?php
class OpsWorksDb {
  public $adapter, $database, $encoding, $host, $username, $password, $reconnect;

  public function __construct() {
    $this->adapter = 'mysql';
    $this->database = 'test';
    $this->encoding = 'utf8';
    $this->host = '127.0.0.1';
    $this->username = 'shippable';
    $this->password = '';
    $this->reconnect = 'true';
  }
}

class OpsWorks {
  public $db;
  public $memcached;
  private $stack_map;

  public function __construct() {
    $this->db = new OpsWorksDb();
    $this->stack_map = array('php-app' => array('127.0.0.1'), 'db-master' => array());
    $this->stack_name = 'RDSStack';
  }

  public function layers() {
    return array_keys($this->stack_map);
  }

  public function hosts($layer) {
    return $this->stack_map[$layer];
  }
}
?>
