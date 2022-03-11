<article class="post">

    <div class="entry-header cf">

    <h1><a href="<?php the_permalink(); ?>" title=""><?php the_title();?></a></h1>

    <p class="post-meta">

        <time class="date" datetime="2014-01-14T11:24"><?php echo get_the_date(); ?></time>
        /
        <span class="categories">
                <?php the_terms($post, 'category', '', ' / ', '');?>
        </span>

    </p>

    </div>

    <div class="post-thumb">
        <a href="<?php the_permalink(); ?>" title="">
            <?php the_post_thumbnail('thumbnail');?>
        </a>
    </div>

    <div class="post-content">

    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
    nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
    cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
    ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>

    </div>

</article> <!-- post end -->