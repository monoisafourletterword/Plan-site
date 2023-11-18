<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function analiz(Request $request)
    {
      $t = "Выберите период за который хотите получить информацию.";
        $totalOrders = 0; 
        $chartData = [
            'labels' => [],
            'data' => []
        ];

        if ($request->isMethod('post')) {
            $period = $request->input('period');
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
    $t = "Сумма всех заказов за период ($period): " . $totalOrders . " руб.";
  } else {
    $t = "Невозможно получить данные о заказах за выбранный период.";
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
        
        return view('analytics1', compact('totalOrders', 'chartData','t'));
    }
    public function analiz2(Request $request)
    {
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
          $response = post('https://api-seller.ozon.ru/v1/analytics/data', $data);
          $sss = [round((($response['result']['totals'][0]) * 100) / 213), 100 - round((($response['result']['totals'][0]) * 100) / 213)];
          $m = 5;
          return view('analytics2', compact('sss'));
    }
}
