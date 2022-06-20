





let openMenu = document.getElementById("menuBar"),
    closeMenu = document.getElementById("closeMenu"),
    menu = document.getElementById("menu"),
    showText = $(".showText");


openMenu.onclick = function () {
    menu.style.transform = "translateX(0%)";
}
closeMenu.onclick = function () {
    menu.style.transform = "translateX(100%)";
}
menu.onblur = function () {
    menu.style.transform = "translateX(100%)";

}

window.onresize = function () {
    if (window.innerWidth > 768) {
        menu.style.transform = "translateX(0%)";
    }


}




setInterval(function () {
    showText.animate({
        left: "100%"
    }, 10000, function () {
        showText.css("left", "-100%");
    });
}, 100);



