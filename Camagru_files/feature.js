// this function will show a random headline
let headlines = [
    "Cheese",
    "Fromage =P",
    "Smile!",
    "Take a Picture!",
    "It's gonna be your Intranet profile..... JK",
    "I promise this is FUN --> for me"];

randomHeadline = function () {
    let randomNumber = Math.floor(Math.random() * 6);
    document.getElementById('homeheadline').innerHTML = headlines[randomNumber];
};

randomHeadline();

//passwordSecureOne = fucntion () {   
//};