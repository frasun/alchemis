<?php
query_posts([
  'post_type' => 'testimonial',
  'post_status' => 'publish',
]);

$post_count = wp_count_posts($post_type = 'testimonial')->publish;
?>

<?php if (have_posts()) : ?>
  <div class="wp-block-alchemis-testimonials swiper mt-1" data-post-count="<?php echo $post_count; ?>">
    <div class="swiper-wrapper flex items-center">
      <?php while (have_posts()) : the_post(); ?>
        <?php $author = get_post_meta(get_the_ID(), 'author', true); ?>
        <figure class="swiper-slide text-greyDark flex flex-col px-5">
          <blockquote class="order-2 text-center">
            <?php echo get_the_excerpt() ?>
          </blockquote>
          <?php if ($author) : ?>
            <figcaption class="order-1 bg-white self-center py-1 px-5 rounded-tl-full rounded-br-full mb-1">
              <?php echo $author; ?>
            </figcaption>
          <?php endif; ?>
        </figure>
      <?php endwhile; ?>
    </div>
    <?php if ($post_count > 1) : ?>
      <div class="swiper-button-prev">
        <svg xmlns="http:www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22">
          <path d="M11,0,22,16H0Z" transform="translate(0 22) rotate(-90)" fill="currentColor" />
        </svg>
      </div>
      <div class="swiper-button-next">
        <svg xmlns="http:www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22">
          <path d="M11,0,22,16H0Z" transform="translate(16) rotate(90)" fill="currentColor" />
        </svg>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>

<?php
wp_reset_query();
?>