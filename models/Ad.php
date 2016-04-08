<?php

class Ad extends BaseModel
{

	protected static $table_name = 'lit'; 
    protected static $columns = ['label','lang_origin','lang_trans','description','img_file','type_id','luis_score'];

    /** Insert a new entry into the database */
    public static function arrayColCheck($array)
    {
        $columns = static::$columns;
        $boolCheck = [];

        foreach ( $columns as $column) {
            
         
            if (!array_key_exists($column, $array)) {   
                array_push($boolCheck, 'the end is here');  
            }

        }
            
        return empty($boolCheck);



    }

    public static function getLastInId() 
    {
        self::dbConnect();
        return self::$dbc->lastInsertId();
    }

    protected function insert()
    {
        
        $stmt = self::$dbc->prepare('INSERT INTO lit (label, lang_origin, lang_trans, description, img_file, type_id, luis_score, user_edit) VALUES (:label, :lang_origin, :lang_trans, :description, :img_file, :type_id, :luis_score, :user_edit)');

            $stmt->bindValue(':label', $this->attributes['label'], PDO::PARAM_STR);
            $stmt->bindValue(':lang_origin',  $this->attributes['lang_origin'],  PDO::PARAM_INT);
            $stmt->bindValue(':lang_trans',  $this->attributes['lang_trans'],  PDO::PARAM_INT);
            $stmt->bindValue(':description',  $this->attributes['description'],  PDO::PARAM_STR);
            $stmt->bindValue(':img_file',  $this->attributes['img_file'],  PDO::PARAM_STR);
            $stmt->bindValue(':type_id',  $this->attributes['type_id'],  PDO::PARAM_INT);
            $stmt->bindValue(':luis_score',  $this->attributes['luis_score'],  PDO::PARAM_INT);
            $stmt->bindValue(':user_edit',  $this->attributes['user_edit'],  PDO::PARAM_INT);


        $stmt->execute();

        $this->attributes['id'] = self::$dbc->lastInsertId();

    }

    /** Update existing entry in the database */
    protected function update($id)
    {
       

        $stmt = self::$dbc->prepare("UPDATE lit SET label = :label, lang_origin = :lang_origin, lang_trans = :lang_trans, description = :description, img_file = :img_file, type_id = :type_id, luis_score = :luis_score, user_edit = :user_edit WHERE id = $id");

            $stmt->bindValue(':label', $this->attributes['label'], PDO::PARAM_STR);
            $stmt->bindValue(':lang_origin',  $this->attributes['lang_origin'],  PDO::PARAM_INT);
            $stmt->bindValue(':lang_trans',  $this->attributes['lang_trans'],  PDO::PARAM_INT);
            $stmt->bindValue(':description',  $this->attributes['description'],  PDO::PARAM_STR);
            $stmt->bindValue(':img_file',  $this->attributes['img_file'],  PDO::PARAM_STR);
            $stmt->bindValue(':type_id',  $this->attributes['type_id'],  PDO::PARAM_INT);
            $stmt->bindValue(':luis_score',  $this->attributes['luis_score'],  PDO::PARAM_INT);
            $stmt->bindValue(':user_edit',  $this->attributes['user_edit'],  PDO::PARAM_INT);

        $stmt->execute();
         
    }


    /**
     * Find a single record in the DB based on its id
     *
     * @param int $id id of the user entry in the database
     *
     * @return User An instance of the User class with attributes array set to values from the database
     */
    // public static function find($id)
    // {
    //     // Get connection to the database --- why?
    //     // self::dbConnect();

       
    //     $stmt = self::$dbc->prepare('SELECT * FROM '. self::$table_name .' WHERE id = :id');
    //     $stmt->bindValue(':id',  $id,  PDO::PARAM_INT);


    //     $stmt->execute();
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //     // The following code will set the attributes on the calling object based on the result variable's contents
    //     $instance = null;

    //     if ($result) {
    //         $instance = new static($result);
    //     }
    //     return $instance;
    // }

    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all($col = '*', $table_name)
    {
        
        self::dbConnect();

        $stmt = self::$dbc->query('SELECT ' . $col . ' FROM '. $table_name);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // returns the specified forgin key column based on the lit table id
    public static function getForKeyCol($id, $col, $f_table, $f_col)
    {    
        
        self::dbConnect();

        $table = static::$table_name;

        $query = <<<EOD

        SELECT $f_col 
        FROM $f_table 
        WHERE id IN(
            SELECT $col
            FROM $table
            WHERE id = $id
        );
EOD;


        $stmt = self::$dbc->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (array_key_exists($f_col , $result)) {
            return $result[$f_col]; 
        }
            return NULL;
    }

    // returns the set of lit items based on a forgin key input
    public static function getFromForKey($select, $col, $f_table, $f_col, $f_col_val)
    {    
       
        self::dbConnect();
        $table = static::$table_name;

        $query = <<<EOD

        SELECT $select 
        FROM $table 
        WHERE $col IN(
            SELECT id
            FROM $f_table
            WHERE $f_col = '$f_col_val'
        );
EOD;

        $stmt = self::$dbc->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if (isset($result)) {
            return $result; 
        }
            return NULL;
    }

       public static function getById($select, $id, $table = 'lit')
    {    
       
        self::dbConnect();
    
        $query = <<<EOD

        SELECT $select 
        FROM $table 
        WHERE id = $id;
EOD;

        $stmt = self::$dbc->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if (isset($result)) {
            return $result; 
        }
            return NULL;
    }




}