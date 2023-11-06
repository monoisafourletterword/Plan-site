
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
            <li><a href="#">Главная</a></li>
            <li><a href="seller.html">Ваш профиль</a></li>
            <li><a href="analysis.php">Аналитика</a></li>
            <li><a href="ozon2.php">&nbsp; &nbsp; &nbsp;  Аналитика 2</a></li>
            <li><a href="#">Настройки</a></li>
          </ul>
        </nav>
      </aside>

      <section class="analytics">


        <!-- Место для графика на PHP -->
        <div class="chart">
          <h2>Место для графика</h2>
          <p> </p>
              <br>
          <div class="container">
            <h1>Выберите период для расчета суммы заказов:</h1>
            <br>
            <div class="buttons">
              <form method="post">
                <button type="submit" name="period" value="месяц" class="button">За месяц</button>
                <button type="submit" name="period" value="полгода" class="button">За полгода</button>
                <button type="submit" name="period" value="год" class="button">За год</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['period'])) {

  function getDateForPeriod($period)
  {
    $toDate = time();
    switch ($period) {
      case 'месяц':
        $fromDate = strtotime("-1 month", $toDate);
        break;
      case 'полгода':
        $fromDate = strtotime("-6 months", $toDate);
        break;
      case 'год':
        $fromDate = mktime(0, 0, 0, 1, 1, date('Y'));
        break;
      default:
        // Если период неизвестен, возвращаем false
        return false;
    }
    return [
      'from' => date("Y-m-d\TH:i:s\Z", $fromDate),
      'to' => date("Y-m-d\TH:i:s\Z", $toDate)
    ];
  }

  function post3($host, $data)
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
  function sumOrdersAmount($data)
  {
    $totalOrdersAmount = 0;

    if (is_array($data['result']['cash_flows'])) {
      foreach ($data['result']['cash_flows'] as $cashFlow) {
        if (isset($cashFlow['orders_amount'])) {
          $totalOrdersAmount += $cashFlow['orders_amount'];
        }
      }
    }
    return $totalOrdersAmount;
  }



  $period = $_POST['period'];
  $dateRange = getDateForPeriod($period);

  if ($dateRange === false) {
    echo "Неверно задан период.";
    exit;
  }

  $data3 = [
    'date' => $dateRange,
    "with_details" => false,
    "page" =>  1,
    "page_size" =>  20,
  ];

  $response = post3('https://api-seller.ozon.ru/v1/finance/cash-flow-statement/list', $data3);
  if (isset($response['result']) && isset($response['result']['cash_flows'])) {
    $totalOrders = sumOrdersAmount($response);
    echo "Сумма всех заказов за период ($period): " . $totalOrders;
  } else {
    echo "Невозможно получить данные о заказах за выбранный период.";
  }  


  $chartData = [
    'labels' => [],
    'data' => []
  ];

  if (isset($response['result']) && isset($response['result']['cash_flows'])) {

    usort($response['result']['cash_flows'], function ($a, $b) {
      return strtotime($a['period']['begin']) - strtotime($b['period']['begin']);
    });


    foreach ($response['result']['cash_flows'] as $cashFlow) {
      $month = date('Y-m', strtotime($cashFlow['period']['begin']));
      if (!array_key_exists($month, $chartData['data'])) {
        $chartData['labels'][] = $month;
        $chartData['data'][$month] = 0;
      }
      $chartData['data'][$month] += $cashFlow['orders_amount'];
    }


    $chartData['data'] = array_values($chartData['data']);
  }
}
?>
<div style="height: 50%; width: 50%; position: absolute;top:79%;left: 50%;transform: translate(-50% , -50%)">
  <div>
    <canvas id="myChart"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($chartData['labels']); ?>,
        datasets: [{
          label: 'График по месяцам',
          data: <?php echo json_encode($chartData['data']); ?>,
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
<br>
<br>
<br>
<br>
<br>
