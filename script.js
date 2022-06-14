//Переменные
const showFilm = document.querySelector("#tFilm");
const showDom = document.querySelector("#tDom");
const showAlbum = document.querySelector("#tAlbum");
const spisok1 = document.querySelector("#spisok1");
const close1 = document.querySelector('#close1');

//Показать список фильмов
showFilm.addEventListener('click', function () {
    spisok1.style.display = "block";
})

//Закрыть список фильмов
close1.addEventListener('click', function () {
    spisok1.style.display = "none";
})

//Добавить событие в план
showDom.addEventListener('click', function () {
    var whatDay = prompt("День недели");
})

//Открыть аудиозаписи в ВК
showAlbum.addEventListener('click', function () {
    window.open("https://vk.com/audios304116844?block=my_playlists&section=all");
})


//Изменение цвета в зависимости от дня недели 0-Вск, 1-Пн, 2-Вт...
var d = new Date();
var n = d.getDay();
let dayColor;
switch (n) {
    case 0:
        dayColor = document.querySelector("#Sund");
        dayColor.style.color = "pink";
        break;
    case 1:
        dayColor = document.querySelector("#Mond");
        dayColor.style.color = "pink";
        break;
    case 2:
        dayColor = document.querySelector("#Tuesd");
        dayColor.style.color = "pink";
        break;
    case 3:
        dayColor = document.querySelector("#Wednesd");
        dayColor.style.color = "pink";
        break;
    case 4:
        dayColor = document.querySelector("#Thursd");
        dayColor.style.color = "pink";
        break;
    case 5:
        dayColor = document.querySelector("#Frid");
        dayColor.style.color = "pink";
        break;
    case 6:
        dayColor = document.querySelector("#Saturd");
        dayColor.style.color = "pink";
        break;
    default:
        alert('Привет! Не работает!');
        break;
}

