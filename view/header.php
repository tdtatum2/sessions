<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .button-holder {
            display: flex;
            flex: 1;
        }
    </style>
</head>
<body>
    <ul class="collection with-header">
        <li class="collection-header">
            <h4>To-Do List</h4>
        </li>
        <li class="collection-item button-holder">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="filter_category">
                <input type="hidden" id="catFilter" name="catFilter" value="All">
                <button class="btn waves-effect waves-light" type="submit" name="action" value="filter_cats">
                    All
                </button>
            </form>
            <?php foreach($allCats as $cat) : ?>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="filter_category">
                    <input type="hidden" id="catFilter" name="catFilter" value="<?php echo $cat['categoryName'] ?>">
                    <button class="btn waves-effect waves-light" type="submit" name="action" value="filter_cats">
                        <?php echo $cat['categoryName'] ?>
                    </button>
                </form>
            <?php endforeach ?>






            
        </li>