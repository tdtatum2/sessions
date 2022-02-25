<?php require('model/database.php') ?>
<?php require('model/todo_db.php') ?>

<?php
    $todoitem = filter_input(INPUT_POST, "todoitem", FILTER_UNSAFE_RAW);
    $desc = filter_input(INPUT_POST, "desc", FILTER_UNSAFE_RAW);
    $newitem = filter_input(INPUT_POST, "newitem", FILTER_UNSAFE_RAW);
    $newdesc = filter_input(INPUT_POST, "newdesc", FILTER_UNSAFE_RAW);
    $itemnum = filter_input(INPUT_POST, "itemnum", FILTER_UNSAFE_RAW);


    $catID = filter_input(INPUT_POST, "catID", FILTER_UNSAFE_RAW);
    if ($catID == NULL || !$catID) {
        $catID = 1;
    }

    
    $catName = filter_input(INPUT_POST, "catName", FILTER_UNSAFE_RAW);
    $catFilter = filter_input(INPUT_POST, "catFilter", FILTER_UNSAFE_RAW);

    

    $action = filter_input(INPUT_POST, "action", FILTER_UNSAFE_RAW);
    if(!$action) {
        $action = filter_input(INPUT_GET, "action", FILTER_UNSAFE_RAW);
        if(!$action) {
            $action = "list_items";
        }
    }
    if($action == 'list_items') {
        $allCats = all_cats();
        $items = list_items();
        include('view/item_list.php');
    } elseif($action == 'add_todo_item') {
        $catID_raw = cat_id($catName);
        $catID = $catID_raw[0]['categoryID'];
        add_todo_item($newitem, $newdesc, $catID);
        $allCats = all_cats();
        $items = list_items();
        include('view/item_list.php');
    } elseif($action == 'delete_item') {
        delete_item($itemnum);
        $allCats = all_cats();
        $items = list_items();
        include('view/item_list.php');
    } elseif($action == 'add_category') {
        add_category($catName);
        $allCats = all_cats();
        $items = list_items();
        include('view/item_list.php');
    } elseif($action == 'filter_cats') {
        if($catFilter != 'All') {
            $catID_raw = cat_id($catFilter);
            $catID = $catID_raw[0]['categoryID'];
            $allCats = all_cats();
            $items = items_by_cat($catID);
            include('view/item_list.php');
        } else {
            $allCats = all_cats();
            $items = list_items();
            include('view/item_list.php');
        }
    }
?>


    
        
        
        
        
        
        
    
</body>
</html>