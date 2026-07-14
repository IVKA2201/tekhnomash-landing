<?php
/* Template Name: Лендинг ТЕХНОМАШ */
get_header();

// Твой ID страницы настроек
$page_id = 11; 
?>

<!-- 1. HERO -->
<section class="hero" style="padding: 50px 0; text-align: center; border-bottom: 2px solid #000;">
    <h1><?php the_field('hero_title', $page_id); ?></h1>
</section>

<!-- 2. АБОУТ -->
<section class="about" style="padding: 50px 0; border-bottom: 2px solid #000;">
    <h2 style="text-align: center;">АБОУТ</h2>
    <div style="max-width: 800px; margin: 0 auto; text-align: center;">
        <?php the_field('about_text', $page_id); ?>
    </div>
</section>

<!-- 3. КАТАЛОГ (подгружаем из Товаров) -->
<section class="catalog" style="padding: 50px 0; border-bottom: 2px solid #000;">
    <h2 style="text-align: center;">Каталог</h2>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; max-width: 1000px; margin: 0 auto;">
        <?php 
        $catalog_query = new WP_Query( array(
            'post_type' => 'catalog_items',
            'posts_per_page' => -1
        ) );
        if ( $catalog_query->have_posts() ) :
            while ( $catalog_query->have_posts() ) : $catalog_query->the_post();
            $img = get_field('item_image');
            $title = get_field('item_title');
        ?>
            <div class="catalog-item" style="border: 2px solid #000; padding: 20px; width: 200px; text-align: center;">
                <?php if($img): ?>
                    <img src="<?php echo $img; ?>" style="width: 100%; height: auto; display: block;">
                <?php endif; ?>
                <h3><?php echo $title; ?></h3>
            </div>
        <?php 
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>

<!-- 4. КОНТАКТЫ -->
<section class="contacts" style="padding: 50px 0; border-bottom: 2px solid #000; display: flex; flex-wrap: wrap; justify-content: center;">
    <div style="flex: 1; min-width: 300px; padding: 20px;">
        <h2>Контакты</h2>
        <p><strong>Телефон:</strong> <?php the_field('contact_phone', $page_id); ?></p>
        <p><strong>Почта:</strong> <?php the_field('contact_email', $page_id); ?></p>
        <p><a href="<?php the_field('contact_maks', $page_id); ?>">Ссылка на МАКС</a></p>
    </div>
    <div style="flex: 1; min-width: 300px; padding: 20px;">
        <div style="border: 2px solid #000; padding: 20px; min-height: 200px;">
            <?php the_field('map_iframe', $page_id); ?>
        </div>
    </div>
</section>

<!-- 5. ЗАКАЗАТЬ -->
<section class="order" style="padding: 50px 0; border-bottom: 2px solid #000; text-align: center;">
    <h2><?php the_field('form_title', $page_id); ?></h2>
    <form action="#" style="display: inline-block; text-align: left;">
        <p><label><?php the_field('field_1_label', $page_id); ?></label><br><input type="text" style="border: 1px solid #000; padding: 5px;"></p>
        <p><label><?php the_field('field_2_label', $page_id); ?></label><br><input type="text" style="border: 1px solid #000; padding: 5px;"></p>
        <p><label><input type="checkbox"> Принять</label></p>
        <p><button type="submit" style="border: 2px solid #000; padding: 10px 40px; background: #fff; font-size: 18px; margin-top: 10px;">Отправить</button></p>
    </form>
</section>

<?php get_footer(); ?>