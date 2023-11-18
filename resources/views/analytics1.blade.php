<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Аналитическая панель</title>
  <link rel="stylesheet"  href="{{ asset('styles.css') }}">
</head>

<body>
<div class="container">
    <header class="header">
        <h1>Аналитика продаж ВСЕМ ПРИВЕТ</h1>
    </header>

    <div class="main-content">
        {{-- Боковое меню --}}
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
                <h2>Место для графика</h2>
                <p> </p>
                <br>
                <div class="container">
                    <h1>Выберите период для расчета суммы заказов:</h1>
                    <br>
                    <div class="buttons">
                        <form method="post">
                            @csrf
                            <button type="submit" name="period" value="месяц" class="button">За месяц</button>
                            <button type="submit" name="period" value="полгода" class="button">За полгода</button>
                            <button type="submit" name="period" value="год" class="button">За год</button>
                        </form>
                    </div>
                    <div class="sum-orders">{{ $t ?? '' }}</div>
                
                    <div class="chart-container">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
   

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($chartData['labels']); ?>,
                datasets: [{
                    label: 'График по месяцам',
                    data:  <?php echo json_encode($chartData['data']); ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
</body>

</html>