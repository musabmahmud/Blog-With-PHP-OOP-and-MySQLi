<?php include "inc/header.php"; ?>
<?php

$db = new Database();
$format = new Format();


$id = $_GET['id'];
if (!isset($id) || $id == NULL) {
    header("Location : 404.php");
}
?>

<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div class="about">
            <?php
            $query = "SELECT * FROM blog_post Where id = '$id'";
            $post = $db->select($query);
            if ($post) {
                $result = $post->fetch_assoc();
            ?>
                <h2><?= $result['title']; ?></h2>
                <h4><?= $format->formatDate($result['date']); ?>, By <?= $result['author']; ?></h4>
                <img src="images/post2.png" alt="MyImage" />
                <p><?= $result['body']; ?></p>
                <div class="relatedpost clear">
                    <h2><?= $result['title']; ?></h2>
                    <a href="#"><img src="images/<?= $result['image']; ?>" alt="post image" /></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include "inc/sidebar.php"; ?>
    <?php include "inc/footer.php"; ?>