window.onload = function () {
    var login = document.getElementById('login');
    var logo = document.getElementById('logo');

    login.onclick=function(){
        window.location.href = '../Login/login.php';
    }

    logo.onclick=function(){
        window.location.reload();
    }
}

function errorFill() {
    var errorFill = document.getElementsByClassName('errorFill');
    errorFill.style.display = '';
}
function errorDiffPass() {
    document.getElementsByClassName('errorDiffPass').style.display = 'block';
}
function errorSmallPass() {
    document.getElementsByClassName('errorSmallPass').style.display = 'block';
}