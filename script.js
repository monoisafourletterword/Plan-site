const showFilm = document.querySelector("#tFilm");
const showDom = document.querySelector("#tDom");
const showAlbum = document.querySelector("#tAlbum");
const spisok1 = document.querySelector("#spisok1");
const close1 = document.querySelector('#close1');

showFilm.addEventListener('click', function () {
    spisok1.style.display = "block";
})

showDom.addEventListener('click', function () {
    var whatDay = prompt("День недели");
})

showAlbum.addEventListener('click', function () {
    window.open("https://vk.com/audios304116844?block=my_playlists&section=all");
})

close1.addEventListener('click', function () {
    spisok1.style.display = "none";
})



