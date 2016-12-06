<?php get_header(); ?>

           
<div class="full-container">

<!-- Large photo -->

<div class="home-overlay">

  <div class="lg-homepage-photo">
    <?php if( get_theme_mod( 'zenlife_lg_photo' ) != "" ): ?>
      <img src="<?php echo get_theme_mod( 'zenlife_lg_photo' ); ?>">
    <?php endif; ?>
  </div>

  <!-- Headlines -->

  <div class="home-text-overlay">

    <div class="site-headline">
      <h2 id="site-headline"><?php echo get_theme_mod('zenlife_headline_text'); ?></h2>
    </div>

    <div class="front-button">

      <?php if ( ! dynamic_sidebar( 'front-button') ): ?>
        <h3>Headline Setup</h3>
        <p>Add the "Call to Action Button" widget here to create a button.</p>
      <?php endif; ?>

    </div>

  </div>

</div> 


<div class="page-container homepage-3">

    <div class="section group">

      <div class="col span_4_of_12 homepage-3-boxes">
      <?php if ( ! dynamic_sidebar( 'create-your-own-1') ): ?>
        <h3>Homepage Feature 1</h3>
        <p>Set up your content with a widget. Go to Appearance > Widgets and use the Homepage Feature widget.</p>
      <?php endif; ?>
      </div>

      <div class="col span_4_of_12 homepage-3-boxes">
      <?php if ( ! dynamic_sidebar( 'create-your-own-2') ): ?>
        <h3>Homepage Feature 2</h3>
        <p>Set up your content with a widget. Go to Appearance > Widgets and use the Homepage Feature widget.</p>
      <?php endif; ?>
      </div>

      <div class="col span_4_of_12 homepage-3-boxes">
      <?php if ( ! dynamic_sidebar( 'create-your-own-3') ): ?>
        <h3>Homepage Feature 3</h3>
        <p>Set up your content with a widget. Go to Appearance > Widgets and use the Homepage Feature widget.</p>
      <?php endif; ?>
      </div>

    </div>         

</div> 

    <div class="first-blog-post clearfix">
      <div class="page-container recent-posts-media clearfix">

        <!-- WP LOOP for Big Post -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'zen-life' ); ?></p>

        <?php endif; ?> 

        <!-- show latest blog posts -->

              <?php
              $args = array( 'posts_per_page' => 1,
                              'orderby' => 'date',
                              'post__in'  => get_option( 'sticky_posts' ),
                              'ignore_sticky_posts' => 1 );

              $postslist = get_posts( $args );
              foreach ( $postslist as $post ) :
              setup_postdata( $post ); ?> 

              <div class="col span_6_of_12">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
              </div>

              <div class="col span_6_of_12">

                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                
                  <p>
                    Posted on <?php echo the_time('l, F jS, Y');?><br />
                    in <?php the_category( ', ' ); ?><br>
                    with <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                  </p>


                <?php the_excerpt(); ?><button><a href="<?php the_permalink(); ?>">Read More</a></button>

              </div> 

             
              <?php
              endforeach; 
              wp_reset_postdata();
              ?>
      </div> 
    </div> 

<div class="page-container">

    <div class="section group">

        <!-- WP LOOP for 2 smaller posts -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'zen-life' ); ?></p>

        <?php endif; ?> 

        <!-- show latest blog posts -->

            <?php
              $args = array( 'posts_per_page' => 2, 'offset' => 1, 'orderby' => 'date' );
              $postslist = get_posts( $args );
              foreach ( $postslist as $post ) :
              setup_postdata( $post ); ?> 

              <div class="col span_6_of_12 recent-posts">

                   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a><br /><br />

                     <div class="recent-posts-details">
                        <p>
                          Posted on <?php echo the_time('l, F jS, Y');?><br />
                          in <?php the_category( ', ' ); ?><br>
                          with <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                        </p>
                    </div>

                    <?php the_excerpt(); ?><button><a href="<?php the_permalink(); ?>">Read More</a></button>

              </div>
              <?php
              endforeach; 
              wp_reset_postdata();
              ?>

    </div>
    
</div>  

    <div class="footer-cta">

      <?php if ( ! dynamic_sidebar( 'front-bar') ): ?>
        <h3>Call to Action Bar Setup</h3>
        <p>Set up your call to action bar with a widget. Go to Appearance > Widgets and add the widget to the "Footer Call to Action Bar" section.</p>
      <?php endif; ?>

    </div>

</div><!-- end of full container -->

<?php get_footer(); ?>