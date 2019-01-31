<?php declare(strict_types=1); get_header(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">Past Events</h1>
            <div class="page-banner__intro">
                <p>This is the list of all past events</p>
            </div>
        </div>
    </div>
<?php
$today = date('m/d/Y');

    $eventQuery = new WP_Query([
        'post_type' => 'event',
        'posts_per_page' => 2,
        'mata_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => [
            [
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            ]
        ]
    ]);

    ?>


    <div class="container container--narrow page-section">
        <?php while($eventQuery->have_posts()): $eventQuery->the_post(); ?>


            <div class="event-summary">
                <a class="event-summary__date t-center" href="#">
                    <span class="event-summary__month">
                        <?php

                        $date = get_field('event_date');
                        $phpDate = new DateTime("$date");
                        echo $phpDate->format('M');
                        ?>
                    </span>
                    <span class="event-summary__day"><?= $phpDate->format('d') ?></span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h5>
                    <p><?= wp_trim_words(get_the_content(), 30) ?> <a href="<?= the_permalink(); ?>" class="nu gray">Learn more</a></p>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        <?= paginate_links(); ?>
    </div>
<?php
get_footer();