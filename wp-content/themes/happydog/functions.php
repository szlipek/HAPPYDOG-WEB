<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


/**
 * Add a sidebar.
 */
function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

// Blocks ACF

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
    if( function_exists('acf_register_block_type') ) {
        acf_register_block_type(array(
            'name'              => 'header',
            'title'             => __('HappyDog - header'),
            'description'       => __('Header na stronie głównej.'),
            'render_template'   => 'modules/blocks/header.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'header'),
        ));
        acf_register_block_type(array(
            'name'              => 'header1 ',
            'title'             => __('HappyDog - header mały'),
            'description'       => __('Header produktowy.'),
            'render_template'   => 'modules/blocks/header1.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'header'),
        ));
        acf_register_block_type(array(
            'name'              => 'product_categroy',
            'title'             => __('HappyDog - Nasze produkty'),
            'description'       => __('Nasze produkty - kategorie.'),
            'render_template'   => 'modules/blocks/product_category.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'products'),
        ));
        acf_register_block_type(array(
            'name'              => 'meet',
            'title'             => __('HappyDog - Poznaj świat HappyDog'),
            'description'       => __('Poznaj świat Happy Dog sekcja z tytułem opisem i ikonkami.'),
            'render_template'   => 'modules/blocks/our_world.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'products'),
        ));
        acf_register_block_type(array(
            'name'              => 'text',
            'title'             => __('HappyDog - Tekst po prawej stronie'),
            'description'       => __('Blok z dużym zdjęciem zdjęciem w tle i tekstem po prawej stronie'),
            'render_template'   => 'modules/blocks/text_right.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'products'),
        ));
        acf_register_block_type(array(
            'name'              => 'series',
            'title'             => __('HappyDog - Serie produktów'),
            'description'       => __('Blok z seriami produktów'),
            'render_template'   => 'modules/blocks/series.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'products'),
        ));
        acf_register_block_type(array(
            'name'              => 'articles',
            'title'             => __('HappyDog - Porady'),
            'description'       => __('Blok z poradami'),
            'render_template'   => 'modules/blocks/news.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'news'),
        ));
        acf_register_block_type(array(
            'name'              => 'newsletter',
            'title'             => __('HappyDog - Newsletter'),
            'description'       => __('Blok z newsletterem'),
            'render_template'   => 'modules/blocks/newsletter.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'news'),
        ));
        acf_register_block_type(array(
            'name'              => 'breadcrumbs',
            'title'             => __('HappyDog - breadcrumbs'),
            'description'       => __('Blok z breadcrumbs - ścieżką do strony'),
            'render_template'   => 'modules/blocks/breadcrumbs.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'news'),
        ));
        acf_register_block_type(array(
            'name'              => 'product_info',
            'title'             => __('HappyDog - informacje o produkcie'),
            'description'       => __('Blok produktowy - informacje o produkcie'),
            'render_template'   => 'modules/blocks/product.php',
            'category'          => 'formatting',
            'icon'              => 'slides',
            'keywords'          => array( 'news'),
        ));
    }
}

function load_parent_stylesheet() {
  wp_enqueue_style( 'spmedia_style', get_template_directory_uri() . '/style.css' );
}

function js_scripts() {
    wp_enqueue_script('spmedia_script', '/wp-content/themes/happydog/assets/js/script-min.js');

}

add_action( 'wp_enqueue_scripts', 'load_parent_stylesheet' );
add_action('wp_footer', 'js_scripts');
add_theme_support( 'post-thumbnails' );



function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




function pagination($pages = '', $range = 4)
    {
        $showitems = ($range * 2)+1;

        $paged = 1;

        $req_uri = array_reverse(explode('/', $_SERVER['REQUEST_URI']));
        foreach ($req_uri as $value) {
           if(is_numeric($value)) {
                $paged = $value;
        	break;
           }
        }
        if(empty($paged)) $paged = 1;

        if($pages == '')  {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages) {
                $pages = 1;
            }
        }

        if(1 != $pages) {
            echo "<div class=\"pagination\">";
                if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
                if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

                for ($i=1; $i <= $pages; $i++) {
                    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                        echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
                    }
                }

                if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\"> &rsaquo;</a>";
                if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'> &raquo;</a>";
                echo "</div>\n";
        }
    }


function wpb_custom_new_menu() {
register_nav_menus( array(
'my-menu' => __( 'my menu', 'text_domain' ),
'footer-menu'  => __( 'Footer Menu', 'text_domain' ),
) );
}
add_action( 'init', 'wpb_custom_new_menu' );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Stopka',
		'menu_title'	=> 'Stopka',
		'menu_slug' 	=> 'global',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


// Add Custom WooCommerce Loop start

function woocommerce_product_loop_start( $echo = true ) {
    ob_start();
    echo '<div class="related__box">';
    if ( $echo )
        echo ob_get_clean();
    else
        return ob_get_clean();
}


// excerpt length

function spmedia_excerpt_length( $length ) {
    return 9;
}
add_filter( 'excerpt_length', 'spmedia_excerpt_length', 999 );

// cart to menu

add_shortcode ('woo_cart_but', 'woo_cart_but' );
function woo_cart_but() {
	ob_start();

        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL

        ?>
        <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        <img src="/wp-content/themes/happydog/assets/img/cart.svg" alt="Koszyk" width="25" height="29" />
        <span>Koszyk</span>
        </a>
        <?php

    return ob_get_clean();

}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );

function woo_cart_but_count( $fragments ) {

    ob_start();

    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();

    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
    }
        ?>
        <img src="/wp-content/themes/happydog/assets/img/cart.svg" alt="Koszyk" width="25" height="29" />
        <span>Koszyk</span>
        </a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}



remove_action('wp_head', 'wp_generator');

function my_secure_generator( $generator, $type ) {
	return '';
}
add_filter( 'the_generator', 'my_secure_generator', 10, 2 );

function my_remove_src_version( $src ) {
	global $wp_version;

	$version_str = '?ver='.$wp_version;
	$offset = strlen( $src ) - strlen( $version_str );

	if ( $offset >= 0 && strpos($src, $version_str, $offset) !== FALSE )
		return substr( $src, 0, $offset );

	return $src;
}
add_filter( 'script_loader_src', 'my_remove_src_version' );
add_filter( 'style_loader_src', 'my_remove_src_version' );

add_filter('xmlrpc_enabled', '__return_false');

// add woocommerce suport to theme

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


// remove styles from wooocmmerce

add_filter( 'woocommerce_enqueue_styles', '__return_false' );


// remove page title from sites

add_filter('woocommerce_show_page_title', 'bbloomer_hide_shop_page_title');

function bbloomer_hide_shop_page_title($title) {
   if (is_shop()) $title = false;
   return $title;
}

// remove products from shop page

add_action( 'pre_get_posts', 'njengah_remove_products_from_shop_page' );

function njengah_remove_products_from_shop_page( $q ) {
   if ( ! $q->is_main_query() ) return;
   if ( ! $q->is_post_type_archive() ) return;
   if ( ! is_admin() && is_shop() ) {
      $q->set( 'post__in', array(0) );
   }
   remove_action( 'pre_get_posts', 'njengah_remove_products_from_shop_page' );

}

remove_action( 'woocommerce_no_products_found', 'wc_no_products_found' );



// Enable Gutenberg in WooCommerce
function activate_gutenberg_product( $can_edit, $post_type ) {

    if ( $post_type == 'product' ) {
        $can_edit = true;
    }
    return $can_edit;
}
add_filter( 'use_block_editor_for_post_type', 'activate_gutenberg_product', 10, 2 );



// Remove gallery from single product
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );


// Remove product title
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Remove product price

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

// Remove product description

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

// Remove add to cart
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

// Remove product tabs

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

function woocommerce_template_product_description() {
  woocommerce_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );

add_filter('woocommerce_product_description_heading', '__return_null');


// remove sale badge

add_filter('woocommerce_sale_flash', 'lw_hide_sale_flash');
function lw_hide_sale_flash()
{
return false;
}


// Remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Remove upsell

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

?>
