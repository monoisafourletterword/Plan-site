<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о продавце</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
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
                                <p>{{$amount}} ₽ (<span class="{{ $sss >= 0 ? 'positive' : 'negative' }}">{{ $sss }}%</span>)</p>
                            </div>
                            <div class="card">
                                <h2>Упущенная выручка</h2>
                                <p>5 314 594 ₽</p>
                            </div>
                        </div>
                        <div class="products">
                            <br>
                            <br>
                            <h2>Товары продавца</h2>
                            <button id="filter-btn"class="filter-button">Фильтр</button>

            <!-- Filter Modal -->
            <div id="filter-modal" class="modal">
                <div class="modal-content">
                    <span class="close" id="close-modal">&times;</span>
                    <h3>Фильтрация</h3>
                    <div>
                        <label for="price-from">Фильтрация по цене (от):</label>
                        <input type="number" id="price-from" class="filter-input" placeholder="0">
                    </div>
                    <div>
                        <label for="price-to">Фильтрация по цене (до):</label>
                        <input type="number" id="price-to" class="filter-input" placeholder="1000000">
                    </div>
                    <div>
                        <label for="product-name">Фильтрация по названию:</label>
                        <input type="text" id="product-name" class="filter-input" placeholder="Введите название товара">
                    </div>
                    <button id="apply-filter-btn" class="filter-button">Применить фильтр</button>
                </div>
            </div>

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
                                <tbody id="table-body">
                                    <? for ($i = 0; $i < count($all); $i++) {

                                    ?>
                                        <tr>
                                            <td><img src="{{$all[$i][0]}}" alt="Нету изображения товара'" class="product-image"></td>
                                            <td>{{$all[$i][1]}}</td>
                                            <td>{{round($all[$i][2],2)}} ₽</td>
                                            <td>{{$all[$i][3]}}<br>
                                                {{$all[$i][4]}}
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
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const data = [];
            const table = document.querySelector("#table-body");
            const filterBtn = document.querySelector("#filter-btn");
            const modal = document.getElementById("filter-modal");
            const closeModalBtn = document.getElementById("close-modal");
            const applyFilterBtn = document.getElementById("apply-filter-btn");

            <?php for ($i = 0; $i < count($all); $i++) { ?>
                data.push({
                    img_path: '<?= $all[$i][0] ?>',
                    name: '<?= $all[$i][1] ?>',
                    price: '<?= $all[$i][2] ?>',
                    nalichie: '<?= $all[$i][3] ?>',
                    hz: '<?= $all[$i][4] ?>'
                })
            <?php } ?>

            filterBtn.addEventListener('click', () => {
                modal.style.display = "block";
            });

            closeModalBtn.addEventListener('click', () => {
                modal.style.display = "none";
            });

            applyFilterBtn.addEventListener('click', () => {
    const from = Number(document.querySelector("#price-from").value) || 0;
    const to = Number(document.querySelector("#price-to").value) || 1000000;
    const nameFilter = document.querySelector("#product-name").value.toLowerCase();

    const filtered = data.filter((elem) => {
        const price = Number(elem.price);
        const productName = elem.name.toLowerCase();
        const nameMatch = productName.includes(nameFilter);

        return price >= from && price <= to && nameMatch;
    });

    updateTable(filtered);
    modal.style.display = "none";
});

            function updateTable(data) {
                while (table.firstChild) {
                    table.removeChild(table.firstChild);
                }

                for (let i = 0; i < data.length; i++) {
                    const row = document.createElement("tr");

                    const cell1 = document.createElement("td");
                    const img = document.createElement("img");
                    img.src = data[i].img_path;
                    img.alt = "Нету изображения товара";
                    img.className = "product-image";
                    cell1.appendChild(img);

                    const cell2 = document.createElement("td");
                    cell2.textContent = data[i].name;

                    const cell3 = document.createElement("td");
                    cell3.innerHTML = `${Number(data[i].price).toFixed(1)} ₽`;

                    const cell4 = document.createElement("td");
                    cell4.innerHTML = `${data[i].nalichie}<br>${data[i].hz}`;

                    const cell5 = document.createElement("td");
                    cell5.textContent = 'Постельное белье';

                    row.appendChild(cell1);
                    row.appendChild(cell2);
                    row.appendChild(cell3);
                    row.appendChild(cell4);
                    row.appendChild(cell5);

                    table.appendChild(row);
                }
            }
        });
    </script>
</html>