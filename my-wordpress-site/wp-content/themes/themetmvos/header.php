<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // Обязательно! Подключает WP-скрипты ?>
    <!-- Первый счётчик (948615) -->
<script type="text/javascript">
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(948615, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/948615" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

<!-- Второй счётчик (21381418) -->
<script type="text/javascript">
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(21381418, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/21381418" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
        <!-- Шапка -->
        <header style="max-width:1200px; margin: 0 auto">
            <div class="logo-block">
                <div class="logo-text">
                    <span class="logo-main">В</span>
                    <span class="logo-main">ТЕХНОМАШ</span>
                    <span class="logo-main">С</span>
                </div>
            </div>
            
            <nav>
                    <?php
$menu_locations = get_nav_menu_locations();
$menu_id = $menu_locations['header-menu'] ?? 0;
if ($menu_id) {
    $menu_items = wp_get_nav_menu_items($menu_id);
    if ($menu_items) {
        foreach ($menu_items as $item) {
            $active_class = ($item->object_id == get_queried_object_id()) ? 'active' : '';
            echo '<a href="' . esc_url($item->url) . '" class="' . $active_class . '">' . esc_html($item->title) . '</a>';
        }
    }
}
?>
            </nav>
            <nav>
                <a href="#" class="btn-orange">Заказать</a>
            </nav>
        </header>
