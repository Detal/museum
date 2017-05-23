<?php
/**
 * Functions and definitions
 *
 * Sets up the theme using core catchresponsive-core and provides some helper functions using catchresponsive-custon-functions.
 * Others are attached to action and
 * filter hooks in WordPress to change core functionality
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0
 */

//define theme version
if ( !defined( 'CATCHRESPONSIVE_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();

	define ( 'CATCHRESPONSIVE_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * Implement the core functions
 */
require trailingslashit( get_template_directory() ) . 'inc/catchresponsive-core.php';
//================================================================================мои функции
function my_childe()
{
    global $post;
    $mypages = get_pages(array('child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc'));
    $name_parent = get_the_title($post->ID);

    foreach ($mypages as $page) {
      


            $content = $page->post_content;

            $thumb = get_the_post_thumbnail($page->ID, 'medium');
            if (!$content)
                ?>
                <div class="one_univer_box" style="width: 32%; position: relative; float: left; margin: 3px; border: 3px solid #c8a813;">
                <div class="course-item" style="text-align: center; box-shadow: none;">
                <div class="course-thumbnail" style="margin: 0; overflow: hidden; position: relative;">
                <a href="<?php echo get_page_link($page->ID); ?>"><?php echo "<div class='frame' style='width:255px; height:255px;margin: 0 auto;margin-top: 9px;border: 1px solid #c8a813; background: #ffffff;'> <span class='helper'></span>" . $thumb . "</div>"; ?></a>
            </div>
            <div class="thim-course-content" style="line-height: 25px; border-top: 0; padding: 0 20px;">
                <div class="course-title" style="font-size: 16px; padding-top:20px;font-weight: 700; color:#5B1386; line-height: 25px;margin: 11px 0 22px;height: 50px;display: block;
                        display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis; text-transform: none;">
                    <a style="color: #5B1386;"
                       href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title; ?></a>
                </div>
                <div class="course-meta"
                     style="    overflow: hidden; position: relative; padding: 14px 0 10px; display: block; margin: 0;">
                    <div style="float: left;"><i
                            class="fa fa-group"></i><?php echo " " . get_post_meta($page->ID, 'views', true); ?></div>
                    <div style="float: right;"><?php echo " " . $name_parent; ?></div>
                </div>
            </div>


            </div>
            </div>

        <?php }
    
}

add_shortcode('my_childrens', 'my_childe');
/*=================================мой js=======================*/
function wptuts_scripts_load_cdn()
{
    // Deregister the included library
    wp_deregister_script( 'jquery' );
    // Register the library again from Google's CDN
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), null, false );
    // Register the script like this for a theme:
    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/custom-script.js', array( 'jquery' ) );
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_load_cdn' );

/*===============не выводит иконки соцсетей в хидере=============*/
function my_noicon_header_right() { ?>
    <aside class="sidebar sidebar-header-right widget-area">
        <section class="widget widget_search" id="header-right-search">
            <div class="widget-wrap">
                <?php echo get_search_form(); ?>
            </div>
        </section>
    </aside><!-- .sidebar .header-sidebar .widget-area -->
    <?php
}

add_action( 'my_noicon_header', 'my_noicon_header_right', 60 );

/*=============================вывод поиска в хидере, пока не работает============*/
function nosearch_primary_menu() {
    ?>
    <!--кнопка скрытого меню-->
    <div class="holder_img_menu_show">
        <i id="img_menu_show" class="fa fa-bars" aira-hidden="true"></i>
    </div>
    <!--===-->
    <nav class="nav-primary search-enabled" role="navigation">
        <div class="wrapper">
            <h1 class="assistive-text"><?php _e( 'Primary Menu', 'catch-responsive' ); ?></h1>
            <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'catch-responsive' ); ?>"><?php _e( 'Skip to content', 'catch-responsive' ); ?></a></div>
            <div id="main_horisontal_menu" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" > <!--style="display: none;"-->
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    $catchresponsive_primary_menu_args = array(
                        'theme_location'    => 'primary',
                        'menu_class'        => 'menu catchresponsive-nav-menu',
                        'container'         => false
                    );
                    wp_nav_menu( $catchresponsive_primary_menu_args );
                }
                else {
                    wp_page_menu( array( 'menu_class'  => 'menu catchresponsive-nav-menu' ) );
                }

                ?>
            </div>
            <!--убран поиск со всех страниц-------------------------------------------------->

        </div><!-- .wrapper -->
    </nav><!-- .nav-primary -->
    <?php
}

add_action( 'nosearch_after_header', 'nosearch_primary_menu', 20 );

/*=========================================подключение fontawersome========================================*/
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function theme_name_scripts() {
    wp_enqueue_style( 'font-awesome',
        WP_PLUGIN_DIR.'/menu-icons/includes/library/icon-picer/css/types/font-awesome.min.css');
}

function logoItkron() { ?>
    <div class='logo' style="position: relative;">
            <img src="/wp-content/themes/catch-responsive/images/itkron.jpg" alt="ITKRON" style="width: 4%; position: absolute; top: 100%; left: 20%;" />
    </div>;
<?php
}

add_action('Itkron', 'logoItkron');