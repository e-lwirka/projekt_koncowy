<?php get_header(); ?>
<header class="page-header"">
    <div class="mask">
        <div class="container">

<!--            <div>-->
<!--                <h2>ZOFIA KRÓL</h2>-->
<!--                <h1>psychotesty - rzeszów</h1>-->
<!--            </div>-->
<!---->
            <a href="<?php echo home_url(); ?>" class="link-back">
                <h2>ZOFIA KRÓL</h2>
                <h1>psychotesty - rzeszów</h1>
            </a>

            <?php
            $telefon = new WP_Query([
                'post_type' => 'page',
                'pagename' => 'kontakt'
            ]); ?>
            <?php if ($telefon->have_posts()) : while ($telefon->have_posts()) : $telefon->the_post(); ?>
                <!-- post -->

                <!--                <a class="header-telefon" href="tel:--><?php //the_field('telefon') ?><!--">-->
                <!--                    --><?php //the_field('telefon') ?>
                <!--                </a>-->
                <div class="header-telefon-box">
                    <?php
                    // check if the repeater field has rows of data
                    if (have_rows('telefony')):

                        // loop through the rows of data
                        while (have_rows('telefony')) :the_row();

                            // display a sub field value
                            ?>

                            <a href="tel:+<?php the_sub_field('telefon'); ?>"
                               class="header-telefon">
                                <?php the_sub_field('telefon'); ?>
                            </a>

                            <?php
                        endwhile;

                    else :

                        // no rows found

                    endif;

                    ?>
                </div>
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>


            <nav>
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                    'menu_class' => 'menu'
                ]);
                ?>
                <!--                <div>-->
                <!--                    <ul id="main-menu" class="menu">-->
                <!--                        <li class="menu-o-mnie"><a href="#o-mnie">o mnie</a></li>-->
                <!--                        <li class="menu-badania"><a href="#badania">badania</a></li>-->
                <!--                        <li class="menu-lokalizacja"><a href="#lokalizacja">lokalizacja</a></li>-->
                <!--                        <li class="menu-kontakt"><a href="#kontakt">kontakt</a></li>-->
                <!--                        <li class="menu-fb"><a target="_blank" href="http://facebook.com">facebook</a></li>-->
                <!--                    </ul>-->
                <!--                </div>-->
            </nav>

        </div>
    </div>
</header>
<!----- header ----->

<section class="o-mnie" data-anchor="o-mnie">
    <div class="container">
        <?php
        $omnie = new WP_Query([
            'post_type' => 'page',
            'pagename' => 'o-mnie'
        ]); ?>

        <h3>O mnie</h3>
        <?php if ($omnie->have_posts()) : while ($omnie->have_posts()) : $omnie->the_post(); ?>
            <!-- post -->
            <?php the_content(); ?>
            <!--        --><?php //get_template_part('templates/test'); ?>

        <?php endwhile; ?>
            <!-- post navigation -->
        <?php else: ?>
            <!-- no posts found -->
        <?php endif; ?>
    </div>
</section>
<!----- o mnie ----->

<section class="badania" data-anchor="badania">
    <div class="container">
        <?php
        $offers = new WP_Query([
            'post_type' => 'offer'
        ]); ?>
        <h3>Badania</h3>
        <div class="badania-container">
            <?php if ($offers->have_posts()) : while ($offers->have_posts()) : $offers->the_post(); ?>

                <div class="badania-item" style="
                        background-image: url(<?php echo the_post_thumbnail_url(); ?>);
                        background-size: cover;
                        ">
                    <a href="<?php the_permalink(); ?>" class="offer-link">
                        <h4><?php the_field('badania-box-naglowek'); ?></h4>
                        <div class="badania-opis"><?php the_field('badania-podtytul'); ?></div>
                    </a>

                </div>


                <!-- post -->
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>
        </div>
    </div>
</section>
<!----- badania ----->

<section class="lokalizacja" data-anchor="lokalizacja">
    <div class="container">
        <h3>Lokalizacja</h3>
    </div>

    <div id="map"></div>

</section>
<!----- lokalizacja ----->

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM9iUnSQ22vZ4-ucB__FnHPQ73EzMQt0A&callback=initMap">
</script>
<?php get_footer(); ?>
