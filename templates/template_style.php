<?php
/**
 * Template Name: Style Guide New
 *

 *
 * @package WooFramework
 * @subpackage Template
 */

get_header();
?>
       
    <!-- #content Starts -->
	<?php //woo_content_before(); ?>
    <div id="content" class="col-full entry">
    
    	<div id="main-sidebar-container">    

            <!-- #main Starts -->
            <?php //woo_main_before(); ?>
            <section id="main">           
            



<?php
	//woo_loop_before();

	if ( have_posts() ) { $count = 0;
		while ( have_posts() ) { the_post(); $count++;

			IF (PARENT_AUTHOR == "WooThemes") {
					require_once('content-style.php');
				} else {
					echo '<div id="content" class="site-content" role="main">

			
<article id="post-171" class="post-171 page type-page status-publish hentry">
<header class="entry-header"><h1 class="entry-title">Style Page Requires a WooTheme</h1></header>
</article>
		';
			}
		}
	}

	//woo_loop_after();
?>



      

           </section><!-- /#main -->
            <?php //woo_main_after(); ?>
            
            
    
            <?php get_sidebar(); ?>

		</div><!-- /#main-sidebar-container -->         

		<?php get_sidebar( 'alt' ); ?>

    </div><!-- /#content -->
	<?php //woo_content_after(); ?>


<?php get_footer(); ?>