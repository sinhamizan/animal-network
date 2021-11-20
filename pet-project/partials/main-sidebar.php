<div class="posts_sidebar">
    <div class="recent_posts">
        <h3>Recnet Posts</h3>
        <?php while( $recent_post = mysqli_fetch_assoc( $recent_posts ) ): ?>
            <div class="recent_item">
                <div class="post_img">
                    <a href="single-post.php?id=<?php echo $recent_post['id']; ?>>"><img src="uploads/posts/<?php echo $recent_post['post_file']; ?>" alt=""></a>
                </div>
                <div class="post_text">
                    <a href="user.php?id=<?php echo $post_author; ?>"><?php echo $ads2[ 'fulll_name' ]; ?></a>
                    <p><?php  echo substr( $recent_post[ 'post_text' ], 0, 90 ); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>