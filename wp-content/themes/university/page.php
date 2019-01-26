<?php
declare(strict_types=1);

get_header(); ?>

<?php
while (have_posts()) {
    the_post();
    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>DONT FORGET TO REPLACE ME LATER</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">

    <?php $parent_id = wp_get_post_parent_id(get_the_ID()); ?>
        <?php if($parent_id) : ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?= get_permalink($parent_id); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Back to <?= get_the_title($parent_id) ?>
                    </a>
                    <span class="metabox__main">
                        <?= the_title(); ?>
                    </span>
                </p>
            </div>
         <?php endif; ?>
        <div class="page-links">
            <h2 class="page-links__title"><a href="#"><?= the_title() ?></a></h2>
            <ul class="min-list">
                <?php
                    if($parent_id) {
                        $function = $parent_id;
                    }else {
                        $function = get_the_ID();
                    }
                    wp_list_pages([
                        'title_li' => NULL,
                        'child_of' => $function
                    ]);
                ?>
            </ul>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>

    </div>
<?php
}
?>
<?php get_footer(); ?>
