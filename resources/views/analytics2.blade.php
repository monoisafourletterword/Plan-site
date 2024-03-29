<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Аналитическая панель</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <header class="header">
      <h1>Аналитика продаж</h1>
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

      <section class="analytics">


        <!-- Место для графика на PHP -->
        <div class="chart">
          <h2>Место для графика</h2>
          <div class"circle"  style="margin-left: 20%; height: 30%; width: 30%; text-align:center">
            <div>
              <canvas id="myChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
              const ctx = document.getElementById('myChart');

              new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: ['Распродано товара в%', 'Не распродано товара в%'],
                  datasets: [{
                    label: 'График по месяцам',
                    data: <?php echo json_encode($sss); ?>,
                    backgroundColor: [
                      'rgb(255, 99, 132)',
                      'rgb(54, 162, 235)',

                    ],
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
        </div>
      </section>
    </div>
  </div>
</body>

</html>