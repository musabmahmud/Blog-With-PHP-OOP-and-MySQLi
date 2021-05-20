<div class="sidebar clear">
    <div class="samesidebar clear">
        <h2>Categories</h2>
        <ul>
            <?php
            $query = "SELECT * FROM blog_category";
            $post = $db->select($query);
            if ($post) {
                while ($result = $post->fetch_assoc()) {
            ?>
                <li><a href="posts.php?category=<?= $result['id'];?>"><?= $result['name'];?></a></li>
            <?php }
            } 
            else{
            ?>
                 <li><a href="#">No related Categories</a></li>
            <?php
            }?>
        </ul>
    </div>
    <div class="samesidebar clear">
        <h2>Latest articles</h2>
        <div class="popular clear">
            <h3><a href="#">Post title will be go here..</a></h3>
            <a href="#"><img src="images/post1.jpg" alt="post image" /></a>
            <p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will
                be go here.</p>
        </div>

        <div class="popular clear">
            <h3><a href="#">Post title will be go here..</a></h3>
            <a href="#"><img src="images/post1.jpg" alt="post image" /></a>
            <p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will
                be go here.</p>
        </div>

        <div class="popular clear">
            <h3><a href="#">Post title will be go here..</a></h3>
            <a href="#"><img src="images/post1.jpg" alt="post image" /></a>
            <p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will
                be go here.</p>
        </div>

        <div class="popular clear">
            <h3><a href="#">Post title will be go here..</a></h3>
            <a href="#"><img src="images/post1.jpg" alt="post image" /></a>
            <p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will
                be go here.</p>
        </div>
    </div>
</div>