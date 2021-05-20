<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>

<?php
$catid = $_GET['category'];
?>

<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <!-- Pagination -->
        <?php
        $per_page = 2;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start_form = ($page - 1) * $per_page;
        ?>
        <!-- Pagination -->
        <?php
        $query = "SELECT * FROM blog_post WHERE catego = '$catid' LIMIT $start_form, $per_page";
        $post = $db->select($query);
        if ($post) {
            while ($result = $post->fetch_assoc()) {

        ?>
                <div class="samepost clear">
                    <h2><a href="post.php?id=<?= $result['id']; ?>"><?= $result['title']; ?> HERE :<?= $result['catego']; ?></a></h2>
                    <h4><?= $format->formatDate($result['date']); ?>, By <a href="#"><?= $result['author']; ?></a></h4>
                    <a href="#"><img src="images/<?= $result['image']; ?>" alt="post image" /></a>
                    <p><?= $format->textShorten($result['body']); ?>
                    </p>
                    <div class="readmore clear">
                        <a href="post.php?id=<?= $result['id']; ?>">Read More</a>
                    </div>
                </div>
        <?php
            } //end while loop
        } else {
            echo "NO more Posts";
        }
        ?>


        <!-- rows count -->
        <?php

        $query = "SELECT * FROM blog_post WHERE catego = '$catid'";
        $res = $db->select($query);
        $total_rows = mysqli_num_rows($res);
        $total_pages = ceil($total_rows / $per_page);
        ?>
        <!-- rows count -->

        <!-- Pagination -->
        <?php
        echo "<span class='pagination'><a href='posts.php?page=1'>First Page</a>";
        if ($page >= 2) {
            echo "<a href='posts.php?page=" . ($page - 1) . "'>  Prev </a>";
        }
        for ($i = 2; $i < $total_pages; $i++) {
            echo "<a href='posts.php?page="
                . $i ."&&category=".$catid."'>" . $i . " </a>";
        }
        if ($total_pages > $page && $page >= 2) {
            echo "<a href='posts.php?page=" . ($page + 1) . "'>  Next </a>";
        }
        echo "<a href='posts.php?page=" . $total_pages . "'>  Last Page </a></span>" ?>
        <!-- Pagination -->
    </div>
    <?php include "inc/sidebar.php"; ?>
    <?php include "inc/footer.php"; ?>