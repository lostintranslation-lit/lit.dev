<?php  
$type = "sign";

var_dump(Ad::getFromForKey('*', 'type_id', 'typet', 'typet', $type));

public static function getFromForKey($select, $col, $f_table, $f_col, $f_col_val)
    {    
       
        $table = static::$table_name;

        $query = <<<EOD

        SELECT $select 
        FROM $table 
        WHERE $col IN(
            SELECT id
            FROM $f_table
            WHERE $f_col = $f_col_val
        );
EOD;

		var_dump($query)
        $stmt = self::$dbc->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if (isset($result)) {
            return $result; 
        }
            return NULL;
    }