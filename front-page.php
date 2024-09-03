<?php get_header()?>

<section class="mb-10 hero">
        <div class="container">
          <div class="title-wrapper">
            <h1 class=""><?php the_field('title')?></h1>
          </div>
          <div
            class="p-1 overflow-hidden md:pl-0 md:p-3 bg-dark text-light marquee-home"
          >
            <p
              class="relative mb-0 uppercase font-generalSemiBold whitespace-nowrap"
            >
              <small class="absolute left-0 z-40 px-5 bg-dark"
                >News Ticker ++</small
              >
              <span class="inline-block marquee">

                <span class="inline-block ml-5 font-generalRegular">
                  <?php echo get_field('ticker-1')?></span
                >

                <span class="inline-block ml-5 font-generalRegular">
                  <?php echo get_field('ticker-2')?></span
                >

                <span class="inline-block ml-5 font-generalRegular">
                  <?php echo get_field('ticker-3')?></span
                >
                
              </span>
            </p>
          </div>
        </div>
</section>

<?php
    $latest = new WP_Query (array(
        'post_type' => 'magazines',
        'posts_per_page' => 1
    ))
?>


<?php if($latest->have_posts()) : while($latest->have_posts()) : $latest->the_post()?>
<section class="mb-10 feature-story">
        <div class="container">
          <article class="grid gap-4 py-5 md:grid-cols-2">
            <h2 class="uppercase" id="feature-header"><?php the_title()?></h2>
            <div class="flex flex-col">
              <p class="mb-5 grow" id="feature-content">
                <?php echo get_field('excerpt')?>
              </p>

              <div class="details" id="feature-details">
                <ul class="">
                  <li><span>Author:</span> Jakob Gronberg</li>
                  <li><span>Date:</span> <?php echo get_the_date('j, F Y')?></li>
                  <li><span>Duration:</span> <?php echo get_field('duration')?></li>
                </ul>
                <a href="#" class="category" id="feature-category"><?php echo get_the_terms($post->ID, 'categories')[0]->name  ?></a>
              </div>
            </div>
          </article>
          <div class="img-wrap">
            <img
              src="<?php echo get_field('thumbnail')?>"
              alt=""
              class="w-full"
              id="feature-img"
            />
          </div>
        </div>
</section>

<?php endwhile;
    else: 
        echo "no more post";
    endif;
    wp_reset_postdata()?>


<?php get_footer()?>