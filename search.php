<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>


<?php
$search = $_GET['search'];
if (!isset($search)) {
    header("Location : 404.php");
}
?>

<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php
        $query = "SELECT * FROM blog_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
        $post = $db->select($query);
        if ($post) {
            while ($result = $post->fetch_assoc()) {

        ?>
                <div class="samepost clear">
                    <h2><a href="post.php?id=<?= $result['id']; ?>"><?= $result['title']; ?></a></h2>
                    <h4><?= $format->formatDate($result['date']); ?>, By <a href="#"><?= $result['author']; ?></a></h4>
                    <a href="#"><img src="images/<?= $result['image']; ?>" alt="post image" /></a>
                    <p><?= $format->textShorten($result['body']); ?>
                    </p>
                    <div class="readmore clear">
                        <a href="post.php?id=<?= $result['id']; ?>">Read More</a>
                    </div>
                </div>
        <?php
            }//end while loop
        } else {
            echo "Search NOT FOUND";
        }
        ?>
    </div>
    <?php include "inc/sidebar.php"; ?>
    <?php include "inc/footer.php"; ?>