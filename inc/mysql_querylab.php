 <?php
/**
 * MySQL QueryLab Class
 * - class used to connect and interact with the MySQL database.
 *
 * @package classes
 * @copyright Copyright 2013 DisK0nn3cT
 **/

class mysqlQueryLab {

  private $connection;

  /**
   * Connect to MySQL Database
   * @param $db_HOST Database host/server address
   * @param $db_USERNAME Database user
   * @param $db_PASSWORD Database password
   * @param $db_NAME Database name (optional)
   * @return boolean
   */
  public function connect($db_HOST, $db_USERNAME, $db_PASSWORD, $db_NAME = '')
  {
    $this->connection = new mysqli($db_HOST, $db_USERNAME, $db_PASSWORD, $db_NAME);

    if ($this->connection->connect_error) {
      $this->error('Could not connect to MySQL: ' . $this->connection->connect_error);
      return false;
    }

    return true;
  }

  /**
   * Select the MySQL Database
   * @param $db_NAME Database name
   * @return void
   */
  public function select_db($db_NAME)
  {
    if (!$this->connection->select_db($db_NAME)) {
      $this->error('Could not select database');
    }
  }

  /**
   * Execute a MySQL Query
   * @param $query Query to execute
   * @return object
   */
  public function execute($query = "SELECT 1 FROM cookies;")
  {
    $results = $this->connection->query($query);

    $data = new stdClass();

    if ($results) {
      $data->query = $query;
      $data->recordCount = $this->recordCount($results);
      $data->affectedRows = $this->affectedRows($results);
      $data->status = 'success';
      while ($row = $results->fetch_assoc()) {
        $data->results[] = $row;
      }
    } else {
      $data->query = $query;
      $data->status = 'could not execute query';
    }

    return $data;
  }

  /**
   * Close the Current MySQL Connection
   * @return void
   */
  public function close()
  {
    $this->connection->close();
  }

  /**
   * Return the ID of the last inserted record
   * @return integer
   */
  public function insert_ID()
  {
    return $this->connection->insert_id;
  }

  /**
   * Return the Record Count of the last query
   * @param $result mysqli_result
   * @return integer
   */
  public function recordCount($result)
  {
    return $result->num_rows;
  }

  /**
   * Return the Affected Row count from the last query
   * @param $result mysqli_result
   * @return integer
   */
  public function affectedRows($result)
  {
    return $result->affected_rows;
  }

  /**
   * Display any custom errors / redirects or log management
   * @param string $message Error message
   * @return void
   */
  public function error($message = 'not defined')
  {
    // optional error logging goes here
    // do not display verbose errors to the user!
    $error = sprintf("An error has occurred: %s.", $message);
    die($error);
  }
}
?>
