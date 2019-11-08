<?php
// Theme setup
function theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus(
        [
            'main_menu' => 'Главное меню',
        ]
    );
}

add_action('after_setup_theme', 'theme_setup');
// Cleanup header
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter('the_generator', '__return_empty_string');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rest_output_link_wp_head');
show_admin_bar(false);
// Enqueue scripts
function theme_scripts()
{
    wp_deregister_script('wp-embed');
    //	wp_deregister_script('jquery');
    //    wp_deregister_script('jquery-migrate');
    wp_enqueue_script('app', get_theme_file_uri('dist/app.js'), null, '', true);
}

add_action('wp_enqueue_scripts', 'theme_scripts');
// Enqueue styles
function theme_styles()
{
    wp_enqueue_style('theme-app', get_theme_file_uri('dist/app.css'), null, null);
}

add_action('wp_enqueue_scripts', 'theme_styles');
// Debug
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

if (!function_exists('phone_filter')) {
    function phone_filter($phone)
    {
        return str_replace([' ', '(', ')', '-'], '', trim($phone));
    }
}
function theme_customize_register($wp_customize)
{
    $wp_customize->add_section('contacts', [
        'title' => 'Контактная информация',
        'priority' => 30,
    ]);
    $wp_customize->add_setting('phone');
    $wp_customize->add_control('phone', [
        'section' => 'contacts',
        'label' => 'Телефон',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('email');
    $wp_customize->add_control('email', [
        'section' => 'contacts',
        'label' => 'E-mail',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('instagram');
    $wp_customize->add_control('instagram', [
        'section' => 'contacts',
        'label' => 'Instagram',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('viber');
    $wp_customize->add_control('viber', [
        'section' => 'contacts',
        'label' => 'Viber',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('telegram');
    $wp_customize->add_control('telegram', [
        'section' => 'contacts',
        'label' => 'telegram',
        'type' => 'text',
    ]);
}

add_action('customize_register', 'theme_customize_register');

//Taxonomy
require_once('taxonomy/product-category.php');

// Post types
require_once('post-types/product.php');

function phone_link($phone)
{
    return str_replace([' ', '(', ')', '-'], '', $phone);
}


function generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        ceil($length / strlen($x)))), 1, $length);
}

//Vue
function get_ajax_posts()
{
    if (!empty($_POST['filters'])) {
        $args = [
            'post_type' => 'product',
            'posts_per_page' => 9,
            'order' => 'date',
            'paged' => $_POST['paged'],
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_category',
                    'field' => 'id',
                    'terms' => explode(',', $_POST['filters'])
                )
            ),
        ];
    } else {
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 9,
            'order' => 'date',
            'paged' => $_POST['paged'],
        );
    }
    $ajaxposts = new WP_Query($args);
    echo json_encode([
        'posts' => format_posts($ajaxposts->posts),
        'last_page' => $ajaxposts->max_num_pages,
    ]);
    exit;
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');


function format_posts($posts)
{
    if (!is_array($posts)) {
        return null;
    }
    $computed = [];
    foreach ($posts as $post) {
        array_push($computed, [
            'id' => $post->ID,
            'title' => $post->post_title,
            'image' => get_the_post_thumbnail_url($post->ID, 'large'),
            'old_price' => get_field('product_old_price', $post->ID),
            'price' => get_field('product_price', $post->ID),
            'permalink' => get_the_permalink($post->ID),
            'quantity' => 1
        ]);
    }
    return $computed;
}

function slugify($text)
{
    $text = strtolower(trim($text));
    $text =
        transliterator_transliterate('Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();',
            $text);
    $text = str_replace([' ', ',', '.'], '-', $text);
    return $text;
}

/**
 * @param $query
 * @param $current
 * @return string
 */
function makeFilterLink($query, $current)
{
    global $wp;
    $output = '';
    if (isset($query['filter'])) {
        $output = '?filter=';
        $filters = explode(',', $query['filter']);
        if (!in_array($current, $filters)) {
            array_push($filters, $current);
        } elseif (($key = array_search($current, $filters)) !== false) {
            unset($filters[$key]);
        }
        if (count($filters)) {
            $output .= implode(',', $filters);
        } else {
            $output = '';
        }
    } else {
        $output = '?filter=' . $current;
    }
    return home_url($wp->request . $output);
}

/**
 * @param $query
 * @param $current
 * @return bool
 */
function checkIfFilterExists($query, $current)
{
    if (empty($query['filter'])) {
        return false;
    }
    return in_array($current, explode(',', $query['filter']));
}

/**
 * @param $image
 * @return array
 */
function getImageTags($image)
{
    $tags = explode(',', $image['caption']);
    $tags = array_map('trim', $tags);
    $tags = array_map('strtolower', $tags);
    return $tags;
}

if (!function_exists('get_video_embed')) {
    function get_video_embed($url)
    {
        if (!$url) {
            return null;
        }
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
            $url, $matches);
        return "https://www.youtube.com/embed/"
            . $matches[1]
            . "?rel=0&showinfo=0&mute=1&loop=1&modestbranding=1";
    }
}

function url()
{
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
}

// Video attr
function get_video_id($url)
{
    if (!$url) {
        return null;
    }
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
        $url, $matches);
    return $matches[1];
}

function getVideoImageLinkAttribute($url)
{
    return 'https://img.youtube.com/vi/' . get_video_id($url) . '/maxresdefault.jpg';
}

function getVideoLinkAttribute($url)
{
    return 'https://www.youtube.com/embed/' . get_video_id($url);
}
