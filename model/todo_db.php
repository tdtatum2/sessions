<?php
    # Necessary Functions

    # Create
    // function add_todo_item($newitem, $newdesc, $catID) {
    //     global $db;
    //     $query = "INSERT INTO todoitems(Title, Description, categoryID) VALUES(:newitem, :newdesc, :catID)";
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':newitem', $newitem);
    //     $statement->bindValue(':newdesc', $newdesc);
    //     $statement->bindValue(':catID', $catID);
    //     $statement->execute();
    //     $statement->closeCursor();
    // }

    // function add_category($catName) {
    //     global $db;
    //     $query = "INSERT INTO categories(categoryName) VALUES(:catName)";
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':catName', $catName);
    //     $statement->execute();
    //     $statement->closeCursor();
    // }

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

    // function cat_id($catName) {
    //     global $db;
    //     $query = 'SELECT categoryID FROM categories WHERE categoryName = :catName LIMIT 1';
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':catName', $catName);
    //     $statement->execute();
    //     $catID = $statement->fetchAll();
    //     $statement->closeCursor();
    //     return $catID;
    // }

    // function all_cats() {
    //     global $db;
    //     $query = 'SELECT categoryName FROM categories ORDER BY categoryID';
    //     $statement = $db->prepare($query);
    //     $statement->execute();
    //     $catNames = $statement->fetchAll();
    //     $statement->closeCursor();
    //     return $catNames;
    // }

    // function items_by_cat($catID) {
    //     global $db;
    //     $query = "SELECT td.ItemNum, td.Title, td.Description, td.categoryID, cat.categoryName FROM todoitems AS td NATURAL JOIN categories AS cat WHERE td.categoryID = :catID";
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':catID', $catID);
    //     $statement->execute();
    //     $items = $statement->fetchAll();
    //     $statement->closeCursor();
    //     return $items;
    // }

    # Delete
    // function delete_item($itemnum) {
    //     global $db;
    //     $query = "DELETE FROM todoitems WHERE ItemNum = :itemnum";
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':itemnum', $itemnum);
    //     $statement->execute();
    //     $statement->closeCursor();
    // }

?>