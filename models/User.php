<?php

class User extends BaseModel
{  
    protected static $table_name = 'user'; 
    protected static $columns = ['username','password'];

/** Insert a new entry into the database */
    protected function insert()
    {
    	self::dbConnect();

        //Use prepared statements to ensure data security
        // prepare a query
        $stmt = self::$dbc->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');

        // bind the values and execute it        
            $stmt->bindValue(':username', $this->attributes['username'], PDO::PARAM_STR);
            $stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);    
            $stmt->execute();

        //Add the i.d. back to the attributes array so the object properly represents a DB record
            $this->attributes ['id'] = self::$dbc->lastInsertId();
    }

/** If required, update existing entry in the database */
    protected function update()
    {
       
    }

}
