<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) :
the_post(); ?>
    <!-- post -->
    <header style="background-image: url(<?php the_post_thumbnail_url(); ?>)"
            class="single-offer-header">
        <div class="mask">
            <a href="<?php echo home_url(); ?>"
               class="link-back left-arrow"></a>

            <a href="<?php echo home_url(); ?>" class="link-back">
                <h2>ZOFIA KRÓL</h2>
                <h1>psychotesty - rzeszów</h1>
            </a>
        </div>
    </header>


<div class="single-offer-container">

    <div class="single-offer-title">
        <?php the_title(); ?>
    </div>
<div class="single-offer-content">
        <?php the_content(); ?>
</div>
    <?php endwhile; ?>
    <!-- post navigation -->
    <?php else: ?>
        <!-- no posts found -->
    <?php endif; ?>

</div>


<?php get_footer(); ?>
