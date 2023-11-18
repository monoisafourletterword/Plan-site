<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная</title>
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>
  <div class="container">
    <header class="header">
      <h1>Главная</h1>
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
          <h2>Здравствуйте, Кутявин Даниил!</h2>
          <p>Ваш доход на текущий момент состовляет: <strong>3 400 212  руб.</strong></p>
        </div>
      </section>
    </div>
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
</body>

</html>
