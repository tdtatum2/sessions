<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy's Used Autos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .button-holder {
            display: flex;
            flex: 1;
            justify-content: space-around;
            text-align: right;
        }
        .flex-line {
            display: flex;
            flex: 1;
            margin-left: 2em;
        }
        .sort {
            margin-left: 2em;
        }
        .money::before {
            content: "$ ";
        }
    </style>
</head>
<body>
    <div class="container-fluid">
    <ul class="collection with-header">
        <li class="collection-header">
            <h4>Zippy's Used Autos</h4>
        </li>
        <?php if($action != 'register' && !isset($_SESSION['userid'])) { ?>
            <li class="collection-item">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="register">
                    <button class="col s6 m3 l1 btn waves-effect waves-light" type="submit" name="action" value="register">
                        Register
                    </button>
                </form>
            </li>
        <?php } elseif(isset($_SESSION['userid']) && $action != 'register' && $action != 'logout') { ?>
            <li class="collection-item">
                <div class="row">
                    <h4>
                        Welcome, <?php echo $_SESSION['userid']; ?>
                    </h4>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="logout">
                    <button class="btn waves-effect waves-light" type="submit" name="action" value="logout">
                        Log Out
                    </button>
                </form>
            </li>
        <?php } ?>

    </ul>
    </div>
