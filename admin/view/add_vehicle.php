<?php include('header.php'); ?>

<div class="row">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="add_vehicle" class="col s12">
        <div class="row">
            <div class="input-field col s4 m3 l1">
                <input type="text" placeholder="Year" id="year" name="year">
            </div>
            <div class="input-field col s8 m6 l4">
                <input type="text" placeholder="Model" id="model" name="model">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s3">
                <select name="make" id="make">
                    <?php foreach ($makes as $item) : ?>
                        <option value=<?php echo $item['makeID'] ?>><?php echo $item['make'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Make</label>
            </div>
            <div class="input-field col s3">
                <select name="type" id="type">
                    <?php foreach ($types as $item) : ?>
                        <option value=<?php echo $item['typeID'] ?>><?php echo $item['type'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Type</label>
            </div>
            <div class="input-field col s3">
                <select name="class" id="class">
                    <?php foreach ($classes as $item) : ?>
                        <option value=<?php echo $item['classID'] ?>><?php echo $item['class'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Class</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4 m3 l1">
                <input type="text" placeholder="Price" id="price" name="price">
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action" value="add_vehicle">
            Add Vehicle
        </button>  
    </form>
</div>
<br><br><br><br>






<div class="row">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="admin">
        <button class="col s6 m3 l1 btn waves-effect waves-light" type="submit" name="action" value="list_items">
           Home
        </button>
    </form>
</div>
<?php include('footer.php'); ?>