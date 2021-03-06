<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
        <a class="globe_button" href='addcat.php'>Add Category</a>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM blog_category ORDER BY id DESC";
                    $category = $db->select($query);
                    if ($category) {
                        $i = 0;
                        while ($result = $category->fetch_assoc()) {
                            $i++;
                ?>
                    <tr class="odd gradeX">
                        <td><?= $i;?></td>
                        <td><?= $result['name'];?></td>
                        <td><a href="editcat.php?catid=<?= $result['id'];?>">Edit</a> || 
                        <a onclick="return confirm('Are You Want To Delete');" href="delcat.php?delid=<?= $result['id'];?>">Delete</a></td>
                    </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>