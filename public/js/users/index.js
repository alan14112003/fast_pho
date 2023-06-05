let mainGif = $('.main-gif');
if (mainGif.css('display') != 'none') {
    setTimeout(() => {
        mainGif.css("display", "none");
    }, 2000)
}