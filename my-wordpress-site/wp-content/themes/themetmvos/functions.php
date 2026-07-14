<?php
// 1. Подключаем CSS
function my_theme_scripts() {
    wp_enqueue_style('themetmvos', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

// 2. Генерируем SEO и Open Graph (Бронебойная версия)
function my_seo_tags() {
    $page_id = 11;
    $site_url = home_url('/');

    // Переменные по умолчанию (чтобы PHP не ругался)
    $title = 'ТЕХНОМАШ-ВОС';
    $description = 'Волоконно-оптические системы';
    $keywords = '';
    $robots = 'index, follow';
    $http_equiv = 'nosniff';
    $og_title = '';
    $og_description = '';
    $og_image = '';
    $og_type = 'website';
    $og_sitename = '';

    if ( function_exists('get_field') ) {
        $acf_title = get_field('og:title', $page_id);
        if ( !empty($acf_title) ) $og_title = $acf_title;

        $acf_hero = get_field('hero_title', $page_id);
        if ( !empty($acf_hero) ) $title = $acf_hero; // Приоритет: если есть Og Title, берем его для Title
        if ( !empty($acf_title) ) $title = $acf_title;

        $acf_desc = get_field('og:description', $page_id);
        if ( !empty($acf_desc) ) {
            $description = $acf_desc;
            $og_description = $acf_desc;
        } else {
            $about_text = get_field('about_text', $page_id);
            if ( !empty($about_text) && is_string($about_text) ) {
                $description = wp_trim_words($about_text, 20, '...');
            }
        }

        $acf_keywords = get_field('keywords', $page_id);
        if ( !empty($acf_keywords) ) $keywords = $acf_keywords;

        $acf_robots = get_field('robots', $page_id);
        if ( !empty($acf_robots) ) $robots = $acf_robots;

        $acf_http_equiv = get_field('http_equiv', $page_id);
        if ( !empty($acf_http_equiv) ) $http_equiv = $acf_http_equiv;

        $acf_og_title = get_field('og:title', $page_id);
        if ( !empty($acf_og_title) ) $og_title = $acf_og_title;

        $acf_og_desc = get_field('og:description', $page_id);
        if ( !empty($acf_og_desc) ) $og_description = $acf_og_desc;

        $acf_og_image = get_field('og:image', $page_id);
        if ( !empty($acf_og_image) && is_string($acf_og_image) ) {
            $og_image = $acf_og_image;
        } else {
            // Если это массив, забираем URL
            if ( is_array($acf_og_image) && isset($acf_og_image['url']) ) {
                $og_image = $acf_og_image['url'];
            }
        }

        $acf_og_type = get_field('og:type', $page_id);
        if ( !empty($acf_og_type) ) $og_type = $acf_og_type;

        $acf_og_sitename = get_field('og:site_name', $page_id);
        if ( !empty($acf_og_sitename) ) $og_sitename = $acf_og_sitename;
    }

    // Если картинка все еще пустая - ставим заглушку
    if ( empty($og_image) ) {
        $og_image = $site_url . 'wp-content/uploads/logo.png'; 
    }
    // Если Open Graph Тайтл пустой, берем обычный тайтл
    if ( empty($og_title) ) {
        $og_title = $title;
    }
    if ( empty($og_description) ) {
        $og_description = $description;
    }
    if ( empty($og_sitename) ) {
        $og_sitename = 'ТЕХНОМАШ-ВОС';
    }

    // Вывод тегов (с безопасным экранированием)
    echo '<title>' . esc_html($title) . '</title>' . "\n";
    echo '<meta name="description" content="' . esc_html($description) . '">' . "\n";
    if ( !empty($keywords) ) {
        echo '<meta name="keywords" content="' . esc_html($keywords) . '">' . "\n";
    }
    echo '<meta name="robots" content="' . esc_html($robots) . '">' . "\n";
    echo '<meta http-equiv="X-Content-Type-Options" content="' . esc_html($http_equiv) . '">' . "\n";
    
    echo '<meta property="og:title" content="' . esc_html($og_title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_html($og_description) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($site_url) . '">' . "\n";
    echo '<meta property="og:type" content="' . esc_html($og_type) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_html($og_sitename) . '">' . "\n";
}
add_action('wp_head', 'my_seo_tags');

// Регистрируем место для меню
function register_my_menus() {
    register_nav_menus( array(
        'header-menu' => __( 'Меню в шапке' ), // 'header-menu' — это идентификатор
    ) );
}
add_action( 'after_setup_theme', 'register_my_menus' );