<?php require('model/database.php') ?>
<?php require('model/todo_db.php') ?>

<?php

    // Setting Up Session
    $lifetime = 60 * 60 * 24 * 14; // 2 Weeks in Seconds
    session_set_cookie_params($lifetime, '/');
    session_start();

    $action = filter_input(INPUT_POST, "action", FILTER_UNSAFE_RAW);
    if(!$action) {
        $action = filter_input(INPUT_GET, "action", FILTER_UNSAFE_RAW);
        if(!$action) {
            $action = "list_items";
        }
    }

    $sortBy = filter_input(INPUT_POST, "sortBy", FILTER_UNSAFE_RAW);
    if(!$sortBy) {
        $sortBy = 'price';
    }

    $make = filter_input(INPUT_POST, "make", FILTER_UNSAFE_RAW);
    if(!$make) {
        $make = 0;
    }

    $type = filter_input(INPUT_POST, "type", FILTER_UNSAFE_RAW);
    if(!$type) {
        $type = 0;
    }

    $class = filter_input(INPUT_POST, "class", FILTER_UNSAFE_RAW);
    if(!$class) {
        $class = 0;
    }

    $firstname = filter_input(INPUT_GET, "firstname", FILTER_UNSAFE_RAW);

    if($firstname) {
        $_SESSION['userid'] = $firstname;
    }

    if($action == 'list_items') {
        $items = list_items($sortBy, $make, $type, $class);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/item_list.php');
    } elseif($action == "price" || $action == "year") {
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        $items = list_items($sortBy, $make, $type, $class);
    } elseif($action == 'register') {
        include('view/register.php');
    } elseif($action == 'logout') {
        include('view/logout.php');
    }
?>


    
        
        
        
        
        
        
    
</body>
</html>