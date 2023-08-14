<?php 
interface DBConnection{
    public function connect():void;
}
class MySQLConnection implements DBConnection{
    public function connect():void{
        
    }
}

class SQLiteConnection implements DBConnection{
    public function connect():void{
        
    }
}

class UserDB {
  
    private $dbConnection;
    
    public function __construct(DBConnection $dbConnection) {
        $this->$dbConnection = $dbConnection;
    }
  
    public function store(User $user) {
        // Lưu user vào Database
    }
}

$userDb = new UserDB(new MySQLConnection);
$userDb = new UserDB(new SQLiteConnection);



?>