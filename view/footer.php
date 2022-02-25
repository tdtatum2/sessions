<li class="collection-item">
            <h5>Add To-Do Item</h5>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="add_todo_item">
                <label for="newitem">Name: </label>
                <input type="text" id="newitem" name="newitem" required>
                <label for="newdesc">Description: </label>
                <input type="text" id="newdesc" name="newdesc" required>
                <label for="catName">Category: </label>
                <div class="input-field">
                    <select name="catName" id="catName">
                        <?php foreach ($allCats as $cat) : ?>
                            <option value="<?php echo $cat['categoryName'] ?>"><?php echo $cat['categoryName'] ?></option>
                        <?php endforeach ; ?>
                    </select>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action" value="add_todo_item">Add Item
                    <i class="material-icons right">add</i>
                </button>
            </form>
        </li>
        <li class="collection-item">
            <h5>Add Category</h5>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="add_category">
                <label for="catName">Category: </label>
                <input type="text" id="catName" name="catName" required>
                <button class="btn waves-effect waves-light" type="submit" name="action" value="add_category">Add Category
                    <i class="material-icons right">add</i>
                </button>
            </form>
        </li>
    </ul>

<footer>
    <p class="copyright"> &copy; <?php echo date("Y"); ?> Fin Tatum</p>
</footer>

</body>
</html>
