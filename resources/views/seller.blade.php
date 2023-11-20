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
            <section class="analytics">
                <div class="chart">
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
                            <p><strong>ФИО: </strong>{{$name}}</p>
                            <p><strong>ИНН:</strong> {{$inn}}</p>
                            <p><strong>Email:</strong> ivanov@example.com</p>
                            <p><strong>Телефон:</strong> +7 (123) 456-78-90</p>
                        </div>
                        <div class="card-container">
                            <div class="card">
                                <h2>Месячная выручка</h2>
                                <p><span class="{{ $sss >= 0 ? 'positive' : 'negative' }}">{{ $sss }}%</span>, {{$amount}} Р</p>
                            </div>
                            <div class="card">
                                <h2>Упущенная выручка</h2>
                                <p>5 314 594 Р</p>
                            </div>
                            <!-- Добавьте дополнительные карточки согласно вашему дизайну -->
                        </div>
                        <!-- ... предыдущий код ... -->
                        <div class="products">
                            <br>
                            <br>
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
                                    <? for ($i = 0; $i < count($all); $i++) {

                                    ?>
                                        <tr>
                                            <td><img src="{{$all[$i][0]}}" alt="Нету изобрадения товара'" class="product-image"></td>
                                            <td>{{$all[$i][1]}}</td>
                                            <td>{{$all[$i][2]}} ₽</td>
                                            <td>{{$all[$i][3]}}
                                                <p>{{$all[$i][4]}}
                                            </td>
                                            <td>Постельное белье</td>
                                        </tr>
                                    <? } ?>
                                    <!-- Добавьте другие товары аналогично -->
                                </tbody>
                            </table>
                        </div>
                        <!-- ... последующий код ... -->

                    </section>
                </div>
            </section>
        </div>
</body>

</html>