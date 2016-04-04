<?php

class Ad extends BaseModel
{

	/** Insert a new entry into the database */
    protected function insert()
    {
    
        self::update();
        $this->attributes['id'] = self::$dbc->lastInsertId();

    }

    /** Update existing entry in the database */
    protected function update()
    {
        $stmt = self::$dbc->prepare('INSERT INTO lit (label, lang_origin, lang_trans, description, img, type_id, luis_score) VALUES (:label, :lang_origin, :lang_trans, :description, :img, :type_id, :luis_score)');

            $stmt->bindValue(':label', $this->attributes['label'], PDO::PARAM_STR);
            $stmt->bindValue(':lang_origin',  $this->attributes['lang_origin'],  PDO::PARAM_INT);
            $stmt->bindValue(':lang_trans',  $this->attributes['lang_trans'],  PDO::PARAM_INT);
            $stmt->bindValue(':description',  $this->attributes['description'],  PDO::PARAM_STR);
            $stmt->bindValue(':img',  $this->attributes['img'],  PDO::PARAM_INT);
            $stmt->bindValue(':type_id',  $this->attributes['type_id'],  PDO::PARAM_INT);

            $stmt->execute();

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
        // Get connection to the database --- why?
        // self::dbConnect();

       
        $stmt = self::$dbc->prepare('SELECT * FROM '."$this->name".' WHERE id = :id');
        $stmt->bindValue(':id',  $id,  PDO::PARAM_INT);


        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

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
        $stmt = self::$dbc->query('SELECT * FROM '."'"."$this->name"."'");

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}