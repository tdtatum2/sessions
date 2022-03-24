<?php
    # Necessary Functions

    # Read
    function list_items($sortBy, $make, $type, $class) {
        global $db;
        $query = "SELECT V.vehicleID, V.makeID, V.typeID, V.classID, V.year, M.make, V.model, T.type, C.class, V.price FROM vehicles AS V INNER JOIN makes M ON V.makeID = M.makeID INNER JOIN types T ON V.typeID = T.typeID INNER JOIN classes C ON V.classID = C.classID";
        if($make != 0) {
            $query.=" WHERE V.makeID = :make";
            if($type != 0) {
                $query.=" AND V.typeID = :type";
            }
            if($class != 0) {
                $query.=" AND V.classID = :class";
            }
        } elseif($type != 0) {
            $query.=" WHERE V.typeID = :type";
            if($class != 0) {
                $query.=" AND V.classID = :class";
            }
        } elseif($class != 0) {
            $query.=" WHERE V.classID = :class";
        }            
        if($sortBy == 'price') {     
            $query.= " ORDER BY V.price DESC;";
        } else {
            $query.= " ORDER BY V.year DESC;";
        }
        $statement = $db->prepare($query);
        if($make != 0) {
            $statement->bindValue(':make', $make);
        }
        if($type != 0) {
            $statement->bindValue(':type', $type);
        }
        if($class != 0) {
            $statement->bindValue(':class', $class);
        }
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    function get_makes() {
        global $db;
        $query = 'SELECT * FROM makes';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    function get_types() {
        global $db;
        $query = 'SELECT * FROM types';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }
    
    function get_classes() {
        global $db;
        $query = 'SELECT * FROM classes';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }


?>