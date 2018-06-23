<?php get_header(); ?>
<header class="page-header" data-anchor="header">
    <div class="mask">
        <div class="container">

            <div class="page-header-header">
                <h2>ZOFIA KRÓL</h2>
                <h1>psychotesty - rzeszów</h1>
            </div>

            <?php
            $telefon = new WP_Query([
                'post_type' => 'page',
                'pagename' => 'kontakt'
            ]); ?>
            <?php if ($telefon->have_posts()) : while ($telefon->have_posts()) : $telefon->the_post(); ?>
              <!-- post -->
                <div class="header-telefon"><?php the_field('telefon') ?></div>

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
        <div class="row">
            <?php if ($offers->have_posts()) : while ($offers->have_posts()) : $offers->the_post(); ?>

                <div class="col-3" style="
                        background-image: url(<?php echo the_post_thumbnail_url(); ?>);
                        background-size: cover;
                        ">
                    <a href="<?php the_permalink(); ?>" class="offer-link">
                        <h4><?php the_title(); ?></h4>
                        <div class="badania-opis"><?php the_content(); ?></div>
                        <!--            <a href="-->
                        <?php //the_permalink(); ?><!--" class="badania-czytaj-wiecej">Czytaj więcej...</a>-->
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

<section class="kontakt" data-anchor="kontakt">
    <div class="container">
        <h3>Kontakt</h3><br>
        <?php
        $kontakt = new WP_Query([
            'post_type' => 'page',
            'pagename' => 'kontakt'
        ]); ?>

        <form action="">

        </form>


        <div class="row">

            <?php if ($kontakt->have_posts()) : while ($kontakt->have_posts()) : $kontakt->the_post(); ?>
                <!-- post -->
                <div class="col-4 box-telefon">
                <div class="icon-telefon"></div>
                    <div class="telefon"><?php the_field('telefon') ?></div>
                </div>

                <div class="col-4 box-mail">

                    <div class="icon-mail"></div>
                    <div class="mail"><?php the_field('mail') ?></div>
                </div>

                <div class="col-4 box-adres">
                    <div class="icon-adres"></div>
                    <div class="ulica-kod">
                    <div class="ulica"><?php the_field('ulica') ?></div>
                    <div class="kod"><?php the_field('kod') ?></div>
                    </div>
                </div>

                <?php the_content(); ?>
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>

        </div>
    </div>
</section>
<!----- kontakt ----->

<?php get_footer(); ?>
