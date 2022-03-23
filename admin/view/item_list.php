<?php include('header.php'); ?>

<!-- MAKES, TYPES, AND CLASSES DROPDOWNS -->
<div class="row">
    <div class="col s12 m8 l6">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div class="row">
            <p class="sort col s3">
                <label for="price">
                    <?php if($sortBy == 'price') { ?> 
                        <input type="radio" name="sortBy" id="price" value="price" checked>
                    <?php } else { ?>
                        <input type="radio" name="sortBy" id="price" value="price">
                    <?php } ?>
                    <span>Price</span>
                </label>
            </p>
            <p class="sort col s3">
                <label for="year">
                    <?php if($sortBy == 'year') { ?>
                        <input type="radio" name="sortBy" id="year" value="year" checked>
                    <?php } else { ?>
                        <input type="radio" name="sortBy" id="year" value="year">
                    <?php } ?>
                    <span>Year</span>
                </label>
            </p>
            </div>
            <br>
            <div class="row">
                <div class="input-field col s3">
                    <select name="make" id="make">
                        <option value=0>All</option>
                        <?php foreach ($makes as $item) : ?>
                            <?php if($item['makeID'] == $make) { ?>
                                <option value=<?php echo $item['makeID'] ?> selected><?php echo $item['make'] ?></option>
                            <?php } else { ?>
                                <option value=<?php echo $item['makeID'] ?>><?php echo $item['make'] ?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                    <label>Make</label>
                </div>
                <div class="input-field col s3">
                    <select name="type" id="type">
                        <option value=0>All</option>
                        <?php foreach ($types as $item) : ?>
                            <?php if($item['typeID'] == $type) { ?>
                                <option value=<?php echo $item['typeID'] ?> selected><?php echo $item['type'] ?></option>
                            <?php } else { ?>
                                <option value=<?php echo $item['typeID'] ?>><?php echo $item['type'] ?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                    <label>Type</label>
                </div>
                <div class="input-field col s3">
                    <select name="class" id="class">
                        <option value=0>All</option>
                        <?php foreach ($classes as $item) : ?>
                            <?php if($item['classID'] == $class) { ?>
                                <option value=<?php echo $item['classID'] ?> selected><?php echo $item['class'] ?></option>
                            <?php } else { ?>
                                <option value=<?php echo $item['classID'] ?>><?php echo $item['class'] ?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                    <label>Class</label>
                </div>
                <button class="col s2 m2 l1 btn waves-effect waves-light sort" type="submit"> Go </button>
            </div>
        </form>
    </div>
</div>

<!-- RESPONSIVE TABLE WITH APPLICABLE VEHICLES -->
<table class="responsive-table centered">
<?php if(!$items) { ?>
    <thead>
        <tr>
            <h4>No Vehicles Found! Try expanding your search.</h4>
        </tr>
    </thead>
<?php } else { ?>
    <thead>
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item) : ?>
            <tr>
                <td><p><?php echo $item['year'] ?></p></td>
                <td><p><?php echo $item['make'] ?></p></td>
                <td><p><?php echo $item['model'] ?></p></td>
                <td><p><?php echo $item['type'] ?></p></td>
                <td><p><?php echo $item['class'] ?></p></td>
                <td><p class="money"><?php echo $item['price'] ?></p></td>
                <td>
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="delete_item">
                        <input type="hidden" name="vehicleID" id="vehicleID" value="<?php echo $item['vehicleID']; ?>">
                        <button class="btn waves-effect waves-light" type="submit" name="action" value="delete_item">
                            <i class="large material-icons ">cancel</i>  
                    </form>
                </td>
            </tr>
        <?php endforeach ; ?>
    </tbody>
    <?php } ?>

    </ul>
</table>

<div class="row">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="admin">
        <button class="col s6 m3 l1 btn waves-effect waves-light" type="submit" name="action" value="add_vehicle_form">
            Add a Vehicle
        </button>
        <button class="col s6 m3 l1 offset-l1 btn waves-effect waves-light" type="submit" name="action" value="edit_makes_form">
            Edit Makes
        </button>
        <button class="col s6 m3 l1 offset-l1 btn waves-effect waves-light" type="submit" name="action" value="edit_types_form">
            Edit Types
        </button>
        <button class="col s6 m3 l1 offset-l1 btn waves-effect waves-light" type="submit" name="action" value="edit_classes_form">
            Edit Classes
        </button>
    </form>
</div>
<?php include('footer.php'); ?>