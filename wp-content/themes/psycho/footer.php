<footer class="kontakt" data-anchor="kontakt">
    <div class="container">
        <h3>Kontakt</h3><br>
        <?php
        $kontakt = new WP_Query([
            'post_type' => 'page',
            'pagename' => 'kontakt'
        ]); ?>

        <div class="kontakt-container">

            <?php if ($kontakt->have_posts()) : while ($kontakt->have_posts()) : $kontakt->the_post(); ?>
                <!-- post -->
                <div class="kontakt-item box-telefon">
                    <div class="icon-telefon"></div>


                    <div class="footer-telefon-box">
                        <?php
                        // check if the repeater field has rows of data
                        if (have_rows('telefony')):

                            // loop through the rows of data
                            while (have_rows('telefony')) :the_row();

                                // display a sub field value
                                ?>

                                <a href="tel:+<?php the_sub_field('telefon'); ?>"
                                   class="telefon">
                                    <?php the_sub_field('telefon'); ?>
                                </a>

                                <?php
                            endwhile;

                        else :

                            // no rows found

                        endif;

                        ?>
                    </div>


                </div>

                <div class="kontakt-item box-mail">

                    <div class="icon-mail"></div>
                    <a class="mail-link" href="mailto:<?php the_field('mail') ?>">
                        <div class="mail"><?php the_field('mail') ?></div>
                    </a>
                </div>

                <div class="kontakt-item box-adres">
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

</footer>

<div style="background-color: #e0e0e0;"
     class="flaticons">Icons made by <a class="flaticons" href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a class="flaticons" href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a class="flaticons" href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>


<?php wp_footer(); ?>
</body>
</html>