<?php include('header.php'); ?>

<div class="row">
    <table class="responsive-table centered">
        <thead>
            <th>Classes</th>
        </thead>
        <tbody>
            <?php foreach($classes as $class) : ?>
                <tr>
                    <td><?php echo $class['class'] ?></td>
                    <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="delete_class">
                            <input type="hidden" name="class" id="class" value="<?php echo $class['classID']; ?>">
                            <button class="btn waves-effect waves-light" type="submit" name="action" value="delete_class">
                                <i class="large material-icons ">cancel</i>  
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="add_class" class="col s12">
        <div class="row">
            <div class="input-field col s8">
                <input type="text" placeholder="Class" name="className" id="className">
            </div>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action" value="add_class">
                Add Class
            </button>
        </div>
    </form>
</div>







<div class="row">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="admin">
        <button class="col s6 m3 l1 btn waves-effect waves-light" type="submit" name="action" value="list_items">
           Home
        </button>
    </form>
</div>
<?php include('footer.php'); ?>