var headlines = [
    "Cheese",
    "Fromage =P",
    "Smile!",
    "Take a Picture",
    "It's gonna be your Intranet profile..... JK"];

// this function will show a random headline
randomHeadline = function () {
    let randomNumber = Math.floor(Math.random()*5);
    document.getElementById('headline').innerHTML = headlines[randomNumber];s
}
