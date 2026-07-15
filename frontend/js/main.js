// Ждем полной загрузки страницы
document.addEventListener('DOMContentLoaded', function () {

    // Получаем все ссылки навигации
    const navLinks = document.querySelectorAll('.nav__link');

    // Получаем все секции, на которые ссылаются пункты меню
    const sections = document.querySelectorAll('section[id]');

    // Функция, которая определяет активную секцию
    function setActiveNav() {
        // Текущая позиция прокрутки + немного смещения
        const scrollPosition = window.scrollY + 100;

        // Проходим по всем секциям
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            // Если текущая позиция прокрутки находится в пределах секции
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                // Убираем активный класс у всех ссылок
                navLinks.forEach(link => {
                    link.classList.remove('nav__link--active');

                    // Добавляем активный класс нужной ссылке
                    if (link.getAttribute('href') === '#' + sectionId) {
                        link.classList.add('nav__link--active');
                    }
                });
            }
        });
    }

    // Вызываем функцию при прокрутке
    window.addEventListener('scroll', setActiveNav);

    // Вызываем один раз при загрузке
    setActiveNav();
});