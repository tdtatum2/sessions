<?php
    # Necessary Functions

    # Create
    function add_todo_item($newitem, $newdesc, $catID) {
        global $db;
        $query = "INSERT INTO todoitems(Title, Description, categoryID) VALUES(:newitem, :newdesc, :catID)";
        $statement = $db->prepare($query);
        $statement->bindValue(':newitem', $newitem);
        $statement->bindValue(':newdesc', $newdesc);
        $statement->bindValue(':catID', $catID);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_category($catName) {
        global $db;
        $query = "INSERT INTO categories(categoryName) VALUES(:catName)";
        $statement = $db->prepare($query);
        $statement->bindValue(':catName', $catName);
        $statement->execute();
        $statement->closeCursor();
    }

    # Read
    function list_items() {
        global $db;
        $query = "SELECT td.ItemNum, td.Title, td.Description, td.categoryID, cat.categoryName FROM todoitems AS td INNER JOIN categories AS cat WHERE td.categoryID = cat.categoryID";
        $statement = $db->prepare($query);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    function cat_name($catID) {
        global $db;
        $query = 'SELECT categoryName FROM categories WHERE categoryID = :catID';
        $statement = $db->prepare($query);
        $statement->bindValue(':catID', $catID);
        $statement->execute();
        $catName = $statement->fetchAll();
        $statement->closeCursor();
        return $catName;
    }

    function cat_id($catName) {
        global $db;
        $query = 'SELECT categoryID FROM categories WHERE categoryName = :catName LIMIT 1';
        $statement = $db->prepare($query);
        $statement->bindValue(':catName', $catName);
        $statement->execute();
        $catID = $statement->fetchAll();
        $statement->closeCursor();
        return $catID;
    }

    function all_cats() {
        global $db;
        $query = 'SELECT categoryName FROM categories ORDER BY categoryID';
        $statement = $db->prepare($query);
        $statement->execute();
        $catNames = $statement->fetchAll();
        $statement->closeCursor();
        return $catNames;
    }

    function items_by_cat($catID) {
        global $db;
        $query = "SELECT td.ItemNum, td.Title, td.Description, td.categoryID, cat.categoryName FROM todoitems AS td NATURAL JOIN categories AS cat WHERE td.categoryID = :catID";
        $statement = $db->prepare($query);
        $statement->bindValue(':catID', $catID);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    # Delete
    function delete_item($itemnum) {
        global $db;
        $query = "DELETE FROM todoitems WHERE ItemNum = :itemnum";
        $statement = $db->prepare($query);
        $statement->bindValue(':itemnum', $itemnum);
        $statement->execute();
        $statement->closeCursor();
    }

?>