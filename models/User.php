<?php
require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel.php
{
/** Insert a new entry into the database */
    protected function insert()
    {
    	self::dbConnect();
//Use prepared statements to ensure data security
		$insert = 'INSERT INTO users (first_name, last_name, email, password) 
		VALUES (:first_name, :last_name, :email, :password)';

		$stmt = self::$dbc->prepare($insert);

//Iterate through all the attributes to build the prepared query		
		foreach ($this->attributes as $key => $value) {
		    $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
		}
		        $stmt->execute();              
		        $id = self::$dbc->lastInsertId();
//Add the i.d. back to the attributes array so the object properly represents a DB record
		        $this->attributes ['id'] = $id;
    }

/** Update existing entry in the database */
    protected function update()
    {
       
    }

    /**
     * Find a single record in the DB based on its id
     *
     * @param int $id id of the user entry in the database
     *
     * @return User An instance of the User class with attributes array set to values from the database
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements

        // @TODO: Store the result in a variable named $result

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new static($result);
        }
        return $instance;
    }

    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all()
    {
        self::dbConnect();

        // @TODO: Learning from the find method, return all the matching records
    }
}
