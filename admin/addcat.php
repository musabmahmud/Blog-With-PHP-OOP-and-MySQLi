<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock"><?php
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$name = $format->validate($_POST['name']);
					$name = mysqli_real_escape_string($db->link, $name);
                    
                    $query = "INSERT INTO blog_category(name) VALUES('$name')";
                    $catinsert = $db->insert($query);
                }?> 
            <form action="addcat.php" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Category Name..." required class="medium" name="name"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
            <a class="globe_button" href='catlist.php'>Back to Category List</a>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>