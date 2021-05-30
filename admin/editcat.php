<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php

    $id = $_GET['catid'];
    if(!isset($id)){
      echo "<script>window.location = 'catlist.php'</script>;";
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <?php
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $id = $_POST['id'];
					$name = $format->validate($_POST['name']);
					$name = mysqli_real_escape_string($db->link, $name);
                    
                    $query = "UPDATE blog_category SET name = '$name' WHERE id = '$id'";
                    $cat_update = $db->update($query);
                    if(isset($cat_update)){
                        $cat_update = "DATA Update SUCCESSFULLY";
                        echo $cat_update;
                    }
                }
            ?>
            <?php
                    $query = "SELECT * FROM blog_category WHERE id = '$id'";
                    $category = $db->select($query);
                    $result = $category->fetch_assoc();
            ?>
            <form action="editcat.php" method="post">
                <table class="form">
                    <input type="hidden" value="<?= $result['id']?>" name="id">
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Category Name..." value="<?= $result['name'];?>" required class="medium" name="name"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
            <a class="globe_button" href='catlist.php'>Back to Category List</a>
        
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>