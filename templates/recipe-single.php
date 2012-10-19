<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}

/**
 * recipe-single.php - The Template for displaying all recipes.
 *
 * @package RecipePress Reloaded
 * @subpackage templates
 * @author dasmaeh
 * @copyright 2012
 * @access public
 * @since 0.1
 */
?>

<div id="post-<?php the_ID(); ?>">
    <ul class="recipe-controls">
        <?php the_recipe_controls(); ?>
    </ul>
    <div class="recipe-header">      
        <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) : ?>
            <div class="recipe-press-image align-left">
                <?php the_post_thumbnail('recipe-press-image'); ?>
            </div>
        <?php endif; ?> 
        <p class="recipe-notes"><?php the_recipe_introduction(array('length' => '5000')); ?></p>
        <?php if ( use_recipe_categories() ) :?>
            <span class="recipe-category">
                <?php _e('Posted in: ', 'recipe-press');
                the_terms(get_the_id(), 'recipe-category');?>
            </span><br/>
        <?php endif; ?>
        <?php if ( use_recipe_cuisines() ): ?>
            <span class="recipe-cuisine">
                <?php _e('from: ', 'recipe-press');
                the_terms(get_the_id(), 'recipe-cuisine');?>
            </span><br/>
        <?php endif; ?>
        <?php if ( use_recipe_seasons() ): ?>
            <span class="recipe-season">
                <?php _e('Season: ', 'recipe-press');
                the_terms(get_the_id(), 'recipe-season');?>
            </span><br/>
        <?php endif; ?>
        <?php if ( use_recipe_courses() ): ?>
            <span class="recipe-course">
                <?php the_terms(get_the_id(), 'recipe-course');?>
            </span>&nbsp;
        <?php endif; ?>
        <?php if ( use_recipe_servings() ): ?>
            <span class="recipe-servings">
                <?php _e("for", "recipe-press"); ?>
                <?php the_recipe_servings(); ?>
            </span>
        <?php endif; ?>
    </div><!-- .recipe-header -->
    <?php if ( use_recipe_times ( ) && get_recipe_prep_time() != ""  ) : ?>
        <div id="recipe-details-<?php the_ID(); ?>" class="recipe-section recipe-section-<?php the_id(); ?>">
            <ul class="recipe-details">
                <?php the_recipe_prep_time(); ?>
                <?php the_recipe_cook_time(); ?>
                <?php the_recipe_ready_time(); ?>
            </ul>
        </div><!-- #recipe-details -->
    <?php endif; ?>

    <div class="recipe-content">
        <h2><?php _e('Ingredients', 'recipe-press'); ?> </h2>
        <?php the_recipe_ingredients(); ?>

        <h2 ><?php _e('Directions', 'recipe-press'); ?></h2>
        <?php the_content(); ?>


        <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'recipe-press'), 'after' => '</div>')); ?>

    </div><!-- .entry-content -->

        <?php do_action('after_recipe_content'); ?>

        <div class="entry-utility">
          <?php edit_post_link(__('Edit', 'recipe-press'), '<span class="edit-link">', '</span>'); ?>
     </div><!-- .entry-utility -->
</div><!-- #post-## -->
