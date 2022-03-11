<?php
/**
 * sparrow_test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sparrow_test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sparrow_test_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sparrow_test, use a find and replace
		* to change 'sparrow_test' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sparrow_test', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails',array('post','slider'));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => 'Верхнее меню',
			'menu-2' => 'Нижнее меню'
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sparrow_test_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sparrow_test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sparrow_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sparrow_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'sparrow_test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function sparrow_test_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'sparrow_test' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'sparrow_test' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'sparrow_test_widgets_init' );

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method() {
	// отменяем зарегистрированный jQuery
	// вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
}

/**
 * Enqueue scripts and styles.
 */
function sparrow_test_scripts() {
	wp_enqueue_style( 'sparrow_test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'sparrow_layout', get_template_directory_uri() . '/assets/css/layout.css', array(), _S_VERSION );
	wp_enqueue_style( 'sparrow_queries', get_template_directory_uri() . '/assets/css/media-queries.css', array(), _S_VERSION );
	wp_style_add_data( 'sparrow_test-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sparrow_test-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sparrow_modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'sparrow_flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sparrow_doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sparrow_init', get_template_directory_uri() . '/assets/js/init.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) == 1 ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sparrow_test_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// хук для регистрации таксономии
add_action( 'init', 'create_taxonomy_portfolio' );
function create_taxonomy_portfolio(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'skills', [ 'portfolio' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Навыки',
			'singular_name'     => 'Навык',
			'search_items'      => 'Найти навыки',
			'all_items'         => 'Все навыки',
			'view_item '        => 'Смотреть навык',
			'parent_item'       => 'Родительский навык',
			'parent_item_colon' => 'Родитель навыка:',
			'edit_item'         => 'Редактировать навык',
			'update_item'       => 'Обновить навык',
			'add_new_item'      => 'Добавить навык',
			'new_item_name'     => 'Новый навык',
			'menu_name'         => 'Навыки',
			'back_to_items'     => '← Возврат к навыкам',
		],
		'description'           => 'Добавить навыки', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}



add_action( 'init', 'register_custom_slider' );
function register_custom_slider(){
	register_post_type( 'slider', [
		'label'  => null,
		'labels' => [
			'name'               => 'Слайдеры', // основное название для типа записи
			'singular_name'      => 'Слайдер', // название для одной записи этого типа
			'add_new'            => 'Добавить новый слайд', // для добавления новой записи
			'add_new_item'       => 'Добавление слайда', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование слайда', // для редактирования типа записи
			'new_item'           => 'Новое на слайде', // текст новой записи
			'view_item'          => 'Смотреть слайд', // для просмотра записи этого типа.
			'search_items'       => 'Искать в слайдере', // для поиска по этим типам записи
			'not_found'          => 'Не найдено в слайде', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Слайдеры', // название меню
		],
		'description'         => 'добавление слайдов',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public 
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public (чтобы отображалось в меню ставим true)
		'show_in_nav_menus'   => null, // зависит от public (чтобы отображалось в меню ставим true)
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-images-alt', // код wp иконки
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail','custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats' // включение доп полей например title или custom fields 
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}


add_action( 'init', 'register_custom_fields' );
function register_custom_fields(){
	register_post_type( 'fields', [
		// 'label'  => 'Колонки',
		'labels' => [
			'name'               => 'Колонки', // основное название для типа записи
			'singular_name'      => 'Колонка', // название для одной записи этого типа
			'add_new'            => 'Добавить новую колонку', // для добавления новой записи
			'add_new_item'       => 'Добавление колонок', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование колонок', // для редактирования типа записи
			'new_item'           => 'Новое на колонке', // текст новой записи
			'view_item'          => 'Смотреть колонки', // для просмотра записи этого типа.
			'search_items'       => 'Искать в колонке', // для поиска по этим типам записи
			'not_found'          => 'Не найдено в колонке', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Колонки', // название меню
		],
		'description'         => 'добавление колонок',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public 
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public (чтобы отображалось в меню ставим true)
		'show_in_nav_menus'   => null, // зависит от public (чтобы отображалось в меню ставим true)
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-images-alt', // код wp иконки
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title','editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats' // включение доп полей например title или custom fields 
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

add_action( 'init', 'register_custom_portfolio' );
function register_custom_portfolio(){
	register_post_type( 'portfolio', [
		// 'label'  => 'Колонки',
		'labels' => [
			'name'               => 'Портфолио', // основное название для типа записи
			'singular_name'      => 'Портфолио', // название для одной записи этого типа
			'add_new'            => 'Добавить новую работу в Портфолио', // для добавления новой записи
			'add_new_item'       => 'Добавление работы в Портфолио', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование работы Портфолио', // для редактирования типа записи
			'new_item'           => 'Новые работы в Портфолио', // текст новой записи
			'view_item'          => 'Смотреть работу в Портфолио', // для просмотра записи этого типа.
			'search_items'       => 'Искать работы в Портфолио', // для поиска по этим типам записи
			'not_found'          => 'Не найдено в Портфолио', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Портфолио', // название меню
		],
		'description'         => 'добавление работ в Портфолио',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public 
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public (чтобы отображалось в меню ставим true)
		'show_in_nav_menus'   => true, // зависит от public (чтобы отображалось в меню ставим true)
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-write-blog', // код wp иконки
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title','editor','custom-fields','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats' // включение доп полей например title или custom fields 
		'taxonomies'          => ['skills'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}