<?php

abstract class BaseModel 
{

	protected static $dbc = null;
	protected $attributes = array();
	


	public function __construct(array $attributes = array())
	{
		self::dbConnect();
		$this->attributes = $attributes;

	}

	public function dbConnect() 
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

        // @TODO: Return the value from attributes for $name if it exists, else return null
    }

    /**
     * Set a new value for a key in attributes
     *
     * @param string $name  key for attributes array
     * @param mixed  $value value to be saved in attributes array
     */
    public function __set($name, $value)
    {
        
        $this->attributes[$name] = $value;

        // @TODO: Store name/value pair in attributes array
    }

    /** Store the object in the database */
    // public function save()
    // {
        
    //     if(!empty($this->attributes)) {  
            
    //         if (array_key_exists('id', $this->attributes)) {
               
    //             $this->update();

    //         } else {

    //             $this->insert();
    //         }

    //     }
    // }

    /**
     * Insert new entry into database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function insert();

    /**
     * Update existing entry in database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function update();



    // public static function delete($id) {

    //     self::dbConnect();

    //     $stmt = self::$dbc->prepare('DELETE FROM Users WHERE id = :id');
    //     $stmt->bindValue(':id',  $id,  PDO::PARAM_INT);

    //     $stmt->execute();

    // }
}

