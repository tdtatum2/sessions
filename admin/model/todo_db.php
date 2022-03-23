<?php
    # Necessary Functions

    # Create
    function add_vehicle($year, $make, $model, $type, $class, $price) {
        global $db;
        $query = "INSERT INTO vehicles(year, makeID, model, typeID, classID, price) VALUES(:year, :make, :model, :type, :class, :price)";
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make', $make);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':type', $type);
        $statement->bindValue(':class', $class);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_make($make) {
        global $db;
        $query = "INSERT INTO makes(make) VALUES(:make)";
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_type($type) {
        global $db;
        $query = "INSERT INTO types(type) VALUES(:type)";
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_class($class) {
        global $db;
        $query = "INSERT INTO classes(class) VALUES(:class)";
        $statement = $db->prepare($query);
        $statement->bindValue(':class', $class);
        $statement->execute();
        $statement->closeCursor();
    }

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

    # Delete
    function delete_item($vehicleID) {
        global $db;
        $query = "DELETE FROM vehicles WHERE vehicleID = :vehicleID";
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicleID', $vehicleID);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_make($makeID) {
        global $db;
        $query = "DELETE FROM makes WHERE makeID = :makeID";
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_type($typeID) {
        global $db;
        $query = "DELETE FROM types WHERE typeID = :typeID";
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_class($classID) {
        global $db;
        $query = "DELETE FROM classes WHERE classID = :classID";
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $statement->closeCursor();
    }

?>