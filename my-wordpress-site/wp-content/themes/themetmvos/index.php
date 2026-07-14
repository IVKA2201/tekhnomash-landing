<?php
/* Template Name: Лендинг ТЕХНОМАШ */
get_header();

// Твой ID страницы настроек
$page_id = 11; 

$img   = get_field('background', $page_id);
?>

<!-- Hero-секция -->
<section class="hero" style="background: url('<?php echo $img; ?>') center/cover no-repeat;">
    <div class="hero-content">
        <h1 style="text-align:right"><?php the_field('hero_title', $page_id); ?></h1>
        <p style="text-align:left"><?php echo get_field('hero_text', $page_id, false); ?></p>
        <div class="hero-buttons">
            <a href="#" class="btn-white">ПАТЕНТЫ</a>
            <a href="#" class="btn-black">ПУБЛИКАЦИИ</a>
        </div>
    </div>
</section>

<!-- Заголовок -->
<div class="market-title">
    <?php the_field('about_title', $page_id); ?>
</div>

<!-- Секция О компании -->
<section class="about-section" style="max-width:1200px; margin: 0 auto">
    <div class="about-left">
        <?php the_field('about_text_1', $page_id, false); ?>
    </div>
    <div class="about-right-box">
        <?php the_field('about_text_2', $page_id, false); ?>
    </div>
</section>

<!-- Заголовок продуктов -->
<div class="products-header">
    ПРОДУКЦИЯ И УСЛУГИ
</div>

<!-- Сетка продуктов -->
<section class="products-grid">
    <?php 
    // Получаем выбранные записи из поля страницы (ACF)
    $selected_ids = get_field('catalog', $page_id);

    // Если поле вернуло массив объектов, извлекаем только ID
    if ( is_array($selected_ids) && ! empty($selected_ids) && ! is_numeric($selected_ids[0]) ) {
        $selected_ids = array_map( function($post) {
            return $post->ID;
        }, $selected_ids );
    }

    // Если есть выбранные ID – строим запрос
    if ( ! empty($selected_ids) ) :
        $catalog_query = new WP_Query( array(
            'post_type'      => 'catalog_items',
            'post__in'       => $selected_ids,
            'posts_per_page' => -1,
            'orderby'        => 'post__in',   // сохраняет порядок из поля
            'post_status'    => 'publish',
        ) );

        if ( $catalog_query->have_posts() ) :
            while ( $catalog_query->have_posts() ) : $catalog_query->the_post();
                $img   = get_field('item_image');
                $title = get_field('item_title');
            ?>
            <div class="product-card">
                <?php if ( $img ) : ?>
                <div class="product-img-placeholder"><img src="<?php echo $img; ?>"></div>
                <?php endif; ?>
                <p>
                    <?php 
                    $file = get_field('file');
                    if($file){?>
                        <a  href="<?php echo esc_url($file); ?>" download="<?php echo esc_html($title); ?>"><?php echo esc_html($title); ?></a>
                    <?php }else echo esc_html($title);
                    ?>
                    </p>
            </div>
            <?php 
            endwhile;
            wp_reset_postdata();
        else : ?>
            <p>Выбранные элементы не найдены.</p>
        <?php endif; ?>

    <?php else : ?>
        <p>В настройках страницы не выбрано ни одного элемента каталога.</p>
    <?php endif; ?>
    
    
</section>

<div class="contacts-header">
    <?php the_field('contacts', $page_id, false); ?>
</div>
<section class="contacts-grid">
    <div class="contact-item">
        <div class="contact-icon">
            <?php $img = get_field('address_icon', $page_id);?>
            <img src="<?php echo $img; ?>" alt="Адрес">
        </div>
        <h3>Адрес</h3>
        <p><?php the_field('address', $page_id, false); ?></p>
    </div>
    <div class="contact-item">
        <div class="contact-icon">
            <?php $img = get_field('phone_icon', $page_id);?>
            <img src="<?php echo $img; ?>" alt="Телефон">
        </div>
        <h3>Телефон</h3>
        <p style="text-align:left;"><?php the_field('phone_number', $page_id, false); ?></p>
    </div>
    <div class="contact-item">
        <div class="contact-icon">
            <?php $img = get_field('mail_icon', $page_id);?>
            <img src="<?php echo $img; ?>" alt="Email">
        </div>
        <h3>Email</h3>
        <p><a href="mailto:<?php the_field('mail', $page_id, false); ?>"><?php the_field('mail', $page_id, false); ?></a></p>
    </div>
</section>



<?php get_footer(); ?>