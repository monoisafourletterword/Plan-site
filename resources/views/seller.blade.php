<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о продавце</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>Информация о продавце</h1>
        </header>

        <div class="main-content">
      <aside class="sidebar">
        <nav>
          <ul>
            <li><a href="{{route('index')}}">Главная</a></li>
            <li><a href="{{route('seller')}}">Ваш профиль</a></li>
            <li><a class="dsa">Аналитика</a></li>
                    <li><a href="{{route('analytics1')}}" id="analyticsSubMenuItem1" style="display: none;">&nbsp; &nbsp; &nbsp; Аналитика 1</a></li>
                    <li><a href="{{route('analytics2')}}" id="analyticsSubMenuItem2" style="display: none;">&nbsp; &nbsp; &nbsp; Аналитика 2</a></li>
            <li><a href="#">Настройки</a></li>
          </ul>
        </nav>
      </aside>
      <script>
    document.addEventListener('DOMContentLoaded', function() {
    var analyticsMenuItem = document.querySelector('nav ul li a[class="dsa"]');
    var analyticsSubMenuItem2 = document.getElementById('analyticsSubMenuItem2');
    var analyticsSubMenuItem1 = document.getElementById('analyticsSubMenuItem1');

    analyticsMenuItem.addEventListener('mouseenter', function() {
        analyticsSubMenuItem2.style.display = 'block';
        analyticsSubMenuItem1.style.display = 'block';
    });

    analyticsMenuItem.addEventListener('mouseleave', function() {
        analyticsSubMenuItem2.style.display = 'none';
        analyticsSubMenuItem1.style.display = 'none';
    });

    analyticsSubMenuItem2.addEventListener('mouseenter', function() {
        analyticsSubMenuItem2.style.display = 'block';
        analyticsSubMenuItem1.style.display = 'block';
    });

    analyticsSubMenuItem2.addEventListener('mouseleave', function() {
        analyticsSubMenuItem2.style.display = 'none';
        analyticsSubMenuItem1.style.display = 'none';
    });
    
    analyticsSubMenuItem1.addEventListener('mouseenter', function() {
        analyticsSubMenuItem2.style.display = 'block';
        analyticsSubMenuItem1.style.display = 'block';
    });

    analyticsSubMenuItem1.addEventListener('mouseleave', function() {
        analyticsSubMenuItem2.style.display = 'none';
        analyticsSubMenuItem1.style.display = 'none';
    });
});

    </script>

            <section class="profile">
                <div class="profile-info">
                    <h2>Профиль</h2>
                    <p><strong>Имя:</strong> Иван Иванов</p>
                    <p><strong>Компания:</strong> ООО "Рога и Копыта"</p>
                    <p><strong>Email:</strong> ivanov@example.com</p>
                    <p><strong>Телефон:</strong> +7 (123) 456-78-90</p>
                </div>

                <!-- ... предыдущий код ... -->
                <div class="products">
                    <h2>Товары продавца</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Фото</th>
                                <th>Название товара</th>
                                <th>Цена</th>
                                <th>Количество на складе</th>
                                <th>Категория</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Пример товара с фотографией -->
                            <tr>
                                <td><img src="utug.jpg" alt="Утюг 'Быстрый пар'" class="product-image"></td>
                                <td>Утюг "Быстрый пар"</td>
                                <td>2500 ₽</td>
                                <td>20</td>
                                <td>Бытовая техника</td>
                            </tr>
                            <!-- Добавьте другие товары аналогично -->
                        </tbody>
                    </table>
                </div>
                <!-- ... последующий код ... -->

            </section>
        </div>
    </div>
</body>

</html>