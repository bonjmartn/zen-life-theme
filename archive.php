<?php get_header(); ?>

      <div class="archives-header">
        <h1><?php wp_title(''); ?></h1>
      </div>

<div class="page-container">

  <div class="section group">

    <div class="col span_8_of_12">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <p><em>
        By <?php the_author(); ?> 
        on <?php echo the_time('l, F jS, Y');?>
        in <?php the_category( ', ' ); ?>.
        <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
        </em></p>            

        <p><?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'large' ); ?>
        <?php endif; ?></p>

        <?php the_excerpt(); ?>

        <br>
        <hr>
        <br>

        <?php endwhile; else: ?>

        <div class="page-header">
            <h1 class="page-title"><?php _e( 'Oh no!', 'zen-life-free' ); ?></h1>
        </div>

        <p><?php _e( 'No content is appearing for this page!', 'zen-life-free' ); ?></p>

        <?php endif; ?>

                <p>&nbsp;</p>

                <div class="pagination">

                    <?php the_posts_pagination( array( 
                    'mid_size' => 2,
                    'type' => 'list',
                    )); ?>

                </div>

                <p>&nbsp;</p>
        
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
        
    </div>
      
      <div class="col span_4_of_12">
        <?php get_sidebar( 'blog' ); ?>
      </div>

  </div>

</div>

<?php get_footer(); ?>