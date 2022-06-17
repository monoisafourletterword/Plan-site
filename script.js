//Переменные
const showFilm = document.querySelector("#tFilm");
const showDom = document.querySelector("#tDom");
const showAlbum = document.querySelector("#tAlbum");
const showKnig = document.querySelector("#tKnig");
const showMenu = document.querySelector("#MainMenu");
const spisok1 = document.querySelector("#spisok1");
const spisok2 = document.querySelector("#spisok2");
const close1 = document.querySelector('#close1');
const close2 = document.querySelector('#close2');
const showButtons = document.querySelector("#Zag");
var zarad = document.querySelectorAll(".Zarad");
const day1 = document.querySelector("#day1");
const day2 = document.querySelector("#day2");
const day3 = document.querySelector("#day3");
const day4 = document.querySelector("#day4");
const day5 = document.querySelector("#day5");
const day6 = document.querySelector("#day6");
const day7 = document.querySelector("#day7");


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

//Показать функционал

var isMenu = false;

showButtons.addEventListener('click', function () {
    if (isMenu) {
        showAlbum.style.display = "inline";
        showFilm.style.display = "inline";
        showDom.style.display = "inline";
        showKnig.style.display = "inline";
        showMenu.style.display = "inline-block";

        isMenu = false;
    } else {
        showAlbum.style.display = "none";
        showFilm.style.display = "none";
        showDom.style.display = "none";
        showKnig.style.display = "none";
        showMenu.style.display = "none";
        isMenu = true;
    }
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
        day7.style.display = "block";
        break;
    case 1:
        dayColor = document.querySelector("#Mond");
        dayColor.style.color = "pink";
        day1.style.display = "block";
        break;
    case 2:
        dayColor = document.querySelector("#Tuesd");
        dayColor.style.color = "pink";
        day2.style.display = "block";
        break;
    case 3:
        dayColor = document.querySelector("#Wednesd");
        dayColor.style.color = "pink";
        day3.style.display = "block";
        break;
    case 4:
        dayColor = document.querySelector("#Thursd");
        dayColor.style.color = "pink";
        day4.style.display = "block";
        break;
    case 5:
        dayColor = document.querySelector("#Frid");
        dayColor.style.color = "pink";
        day5.style.display = "block";
        break;
    case 6:
        dayColor = document.querySelector("#Saturd");
        dayColor.style.color = "pink";
        day6.style.display = "block";
        break;
    default:
        alert('Привет! Не работает!');
        break;
}

//Показать упражнения зарядки
for (var i = 0; i < zarad.length; i++) {
    zarad[i].onclick = function(){
        spisok2.style.display = "block";
    };
  }

  //Закрыть список фильмов
close2.addEventListener('click', function () {
    spisok2.style.display = "none";
})