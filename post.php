<?php include "inc/header.php"; ?>
<?php

$id = $_GET['id'];
if (!isset($id)) {
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
                <img src="images/<?= $result['image']; ?>" alt="MyImage" />
                <p><?= $result['body']; ?></p>
            <?php } else {
                header("Location : 404.php");
            } ?>
            <div class="relatedpost clear">
                <h2>Related Posts</h2>
                <?php
                $categoid = $result['catego'];
                $relatedquery = "SELECT * FROM blog_post Where catego = '$categoid' limit 4";
                $relatedpost = $db->select($relatedquery);
                if ($relatedpost) {
                    while ($relatedresult = $relatedpost->fetch_assoc()) {
                ?>
                        <a href="post.php?id=<?= $relatedresult['id']; ?>"><img src="images/<?= $relatedresult['image']; ?>" alt="post image" /></a>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <?php include "inc/sidebar.php"; ?>
    <?php include "inc/footer.php"; ?>