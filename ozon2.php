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
            <li><a href="index.html">Главная</a></li>
            <li><a href="seller.html">Ваш профиль</a></li>
            <li><a href="analysis.php">Аналитика</a></li>
            <li><a href="ozon2.php">&nbsp; &nbsp; &nbsp; Аналитика 2</a></li>
            <li><a href="#">Настройки</a></li>
          </ul>
        </nav>
      </aside>

      <section class="analytics">


        <!-- Место для графика на PHP -->
        <div class="chart">
          <h2>Место для графика</h2>

          <?php


          function post($host, $data)
          {
            $api_key = '6254a8e6-00a7-4840-bfcc-b2eebd4c420d';
            $client_id = '527772';

            $headers = [
              'Client-Id: ' . $client_id,
              'Api-Key: ' . $api_key,
              'Content-Type: application/json'
            ];

            $curl = curl_init($host);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $return = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
              $res = "cURL Error #: " . $err;
            } else {
              $res = json_decode($return, true);
            }

            return $res;
          }
          $currentYear = date("Y");

          // Создаем временную метку для начала года
          $beginOfYearTimestamp = mktime(0, 0, 0, 1, 1, $currentYear);
          $num_days_ago = 30;
          $data = [
            "date_from" => "2023-04-01",
            "date_to" => "2023-10-15",
            "metrics" => ["ordered_units", "revenue"],
            "dimension" => ["month"],
            "filters" => [],
            "sort" => [
              [
                "key" => "ordered_units",
                "order" => "DESC"
              ]
            ],
            "limit" => 1000,
            "offset" => 0
          ];

          echo "<pre>";
          $response = post('https://api-seller.ozon.ru/v1/analytics/data', $data);
          $sss = [round((($response['result']['totals'][0]) * 100) / 213), 100 - round((($response['result']['totals'][0]) * 100) / 213)];
          $m = 5;
          echo "</pre>";

          ?>
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