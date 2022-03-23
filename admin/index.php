<?php require('model/database.php') ?>
<?php require('model/todo_db.php') ?>

<?php
    $vehicleID = filter_input(INPUT_POST, "vehicleID", FILTER_UNSAFE_RAW);
    $year = filter_input(INPUT_POST, "year", FILTER_UNSAFE_RAW);
    $model = filter_input(INPUT_POST, "model", FILTER_UNSAFE_RAW);
    $price = filter_input(INPUT_POST, "price", FILTER_UNSAFE_RAW);
    $makeName = filter_input(INPUT_POST, "makeName", FILTER_UNSAFE_RAW);
    $typeName = filter_input(INPUT_POST, "typeName", FILTER_UNSAFE_RAW);
    $className = filter_input(INPUT_POST, "className", FILTER_UNSAFE_RAW);

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
    } elseif($action == 'delete_item') {
        delete_item($vehicleID);
        $items = list_items($sortBy, $make, $type, $class);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/item_list.php');
    } elseif($action == 'add_vehicle_form') {
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/add_vehicle.php');
    } elseif($action == 'add_vehicle') {
        add_vehicle($year, $make, $model, $type, $class, $price);
        $make = 0;
        $type = 0;
        $class = 0;
        $items = list_items($sortBy, $make, $type, $class);
        include('view/item_list.php');
    } elseif($action == 'edit_makes_form') {
        $makes = get_makes();
        include('view/edit_makes.php');
    } elseif($action == 'delete_make') {
        delete_make($make);
        $makes = get_makes();
        include('view/edit_makes.php');
    } elseif($action == 'add_make') {
        add_make($makeName);
        $makes = get_makes();
        include('view/edit_makes.php');
    } elseif($action == 'edit_types_form') {
        $types = get_types();
        include('view/edit_types.php');
    } elseif($action == 'delete_type') {
        delete_type($type);
        $types = get_types();
        include('view/edit_types.php');
    } elseif($action == 'add_type') {
        add_type($typeName);
        $types = get_types();
        include('view/edit_types.php');
    } elseif($action == 'edit_classes_form') {
        $classes = get_classes();
        include('view/edit_classes.php');
    } elseif($action == 'add_class') {
        add_class($className);
        $classes = get_classes();
        include('view/edit_classes.php');
    } elseif($action == 'delete_class') {
        delete_class($class);
        $classes = get_classes();
        include('view/edit_classes.php');
    }
?>


    
        
        
        
        
        
