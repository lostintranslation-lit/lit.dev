<?php

abstract class BaseModel 
{
	protected static $dbc = null;   
	protected $attributes = array();
    protected static $table_name;
	
	public function __construct(array $attributes = array())
    {
    	self::dbConnect();
    	$this->attributes = $attributes;

    }

	public static function dbConnect() 
    {
		if (!self::$dbc) {   			
			$dbc = new PDO('mysql:host=127.0.0.1;dbname=lit_db', 'lit_user', 'lit_user');
            $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbc = $dbc;
		}
    }

	public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {               
            return $this->attributes[$name];
        }
            return Null;
    }

    public function __set($name, $value)
    {            
        $this->attributes[$name] = $value;
    }

    public function save()
    {    
        if(!empty($this->attributes)) {  
        if (array_key_exists('id', $this->attributes)) {   
        $this->update();
            } else {
                 $this->insert();
            }
        }
    }

// adding function to find data already in database:
    public function find()
    {    
        if(!empty($this->attributes)) {  
        if (array_key_exists('id', $this->attributes)) {   
        $this->update();
            } else {
                 $this->insert();
            }
        }
    }
    
    public static function truncate($table_name)
    {
        self::dbConnect();
        $query = "TRUNCATE $table_name;";
        self::$dbc->exec($query);

    }
    
    public static function delete($id, $table_name) 
    {
        self::dbConnect();        
        $stmt = self::$dbc->prepare("DELETE FROM $table_name WHERE id = :id");
        $stmt->bindValue(':id',  $id,  PDO::PARAM_INT);
        $stmt->execute();
    }

}

