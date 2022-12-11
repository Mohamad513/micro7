<?php

namespace App\Models\Contract;
use App\Models\Contract\BaseModel;
use PDOException;
use Medoo\Medoo;


class MysqlBaseModel extends BaseModel{

    public function __construct($id = null){
        try {

            // $this->connection = new \PDO("mysql:dbname={$_ENV['DB_NAME']};host={$_ENV['DB_HOST']}", $_ENV['DB_USER'], $_ENV['DB_PASS']);
            // $this->connection->exec("set names utf8;");
            
            $this->connection = new Medoo([
                // [required]
                'type' => 'mysql',
                'host' => $_ENV['DB_HOST'],
                'database' => $_ENV['DB_NAME'],
                'username' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASS'],
             
                // [optional]
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'port' => 3306,
             
                // [optional] The table prefix. All table names will be prefixed as PREFIX_table.
                'prefix' => '',
             
                // [optional] To enable logging. It is disabled by default for better performance.
                'logging' => true,
             
                // [optional]
                // Error mode
                // Error handling strategies when the error has occurred.
                // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
                // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
                'error' => \PDO::ERRMODE_EXCEPTION,
             
                // [optional] Medoo will execute those commands after the database is connected.
                'command' => [
                    'SET SQL_MODE=ANSI_QUOTES'
                ]
            ]);

            } catch(PDOException $e) {
            echo "connection failed :" . $e->getMessage();
            }
            if(!is_null($id))
                return $this->find($id);

        }

    public function create(array $data) : int {

        $this->connection->insert($this->table,$data);
        return  $this->connection->id();

    }
    
    #read (select) single | multiple
     public function find($id) : object {

        $record = $this->connection->get($this->table,'*',[$this->primarykey => $id]);
        foreach($record as $col => $val){
            $this->attributes[$col] = $val ;
        }
        // var_dump( $this->attributes);
        return $this;

        }

     public function getAll() : array {
    
        return $this->connection->select($this->table,'*');
    
    }
     public function get(array $columns,array $where) : array {
    
        return $this->connection->select($this->table,$columns,$where);
    
    }
    
    #update
    public function update(array $data,array $where) : int {
    
        $result =  $this->connection->update($this->table,$data,$where);
        return $result->rowCount();    
    }
    
    #delete
    public function delete(array $where) : int {
    
        $result = $this->connection->delete($this->table,$where);    
        return $result->rowCount();    


    }

}

