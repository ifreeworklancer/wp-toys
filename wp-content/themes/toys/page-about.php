<?php
/*
Template Name: О нас
Template Post Type: page
*/
get_header();
?>

    <!-- About -->
    <section id="page-about" class="page page-about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-title">
                        <?= the_title(); ?>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div class="page-description">
                        <?php
                        while ( have_posts() ) : the_post();
                            echo get_the_content();
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer(); ?>