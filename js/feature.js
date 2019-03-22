randomHeadline = function () {
  let headlines = [
    "Cheese :)",
    "Fromage =P",
    "Smile!",
    "Take a Picture!",
    "Don't be shy",
    "Click and upload"];

  let randomNumber = Math.floor(Math.random() * 6);
    document.getElementById('homeheadline').innerHTML = headlines[randomNumber];
};
randomHeadline();

let filterAdded = 0;

function addFilter(imgSource){
  image = document.getElementById("addon");
  image.src = imgSource;
  filterAdded = 1;
};

function addUpload(imgSource){
  image = document.getElementById("upload");
  image.src = imgSource;
};

function removeUpload(){
  image = document.getElementById("upload");
  if (image.src) {
    image.src = "/camagru/images/empty.png";
  }
  else {
    exit;
  }
}

//video steam with webcam 
var video = document.querySelector("#camerastream");
if (navigator.mediaDevices.getUserMedia) {       
    navigator.mediaDevices.getUserMedia({video: true})
    . then(function(stream) {
        video.srcObject = stream;
    })
    . catch(function(error) {
        alert("Something went wrong with the Webcam!");
    });
}

//snackbar
function snackBarEdit(){
    var bar = document.getElementById("snackbar");
    bar.className = "show";
    setTimeout( function(){ bar.className = bar.className.replace("show", ""); }, 3000);
}

function takeAPicture(){
  if (filterAdded == 1)
  {
      var canvas = document.getElementById("posts");
      var camerastream = document.getElementById("camerastream");
      var addon = document.getElementById("addon");
      var upload = document.getElementById("upload");
      var ctx = canvas.getContext("2d");
      ctx.drawImage(camerastream, 0, 0, 300, 150);
      ctx.drawImage(upload, 0, 0, 300, 150);
      ctx.drawImage(addon, 0, 0, 300, 150);
  }  
  else {
      alert("You have to add one of filters above to your picture.");
  }
}

function canvasData(){
  alert("test");  
    var canvas = document.getElementById("posts");
    var canvasData = canvas.toDataURL("image/png");
    // canvasData.replace('data:image/png;base64,', '');
    // canvasData.replace(' ', '+');
      // if (document.getElementByName("canvasData").value = canvasData){
      //   alert("good");
      // } else {
      //   alert('fail');
      // };
    var form = document.getElementById("postsform");
    var test = document.getElementsByName("imgData");
    test.setAttribute("value", "test");
    form.appendChild(test);
  }
    // var form = document.createElement("form");
    // form.setAttribute("method", "post");
    // form.setAttribute("action", "config/process.php");
    
    // var form = document.getElementById("postsform");
    // var hiddenField = document.createElement("input");
    // hiddenField.setAttribute("type", "hidden");
    // hiddenField.setAttribute("name", "screen");
    // hiddenField.setAttribute("value", canvasData);
    // form.appendChild(hiddenField);

    // var form = new FormData(document.forms["form"]);
    // var xhr = new XMLHttpRequest();
    // // xhr.onreadystatechange = function() {}
    // if (xhr.open("POST", '../config/process.php', true)){
    //   alert("good");
    // } else {
    //   alert("ok");
    // };
    // if (xhr.send(form)){
    //   alert('succeed');
    // } else {
    //   alert("oooooerror");
    // };

    // var blob = new Blob([canvasData], {type: "text/plain;charset=utf-8"});
    // saveAs(blob, '../config/imginfo.txt');
    
    // canvasData = atob(canvasData);
    // if (window.location.href = "http://localhost:8300/camagru/config/process.php?canvasData=" + canvasData){
    //     alert(canvasData);
    // }else {
    //     alert("error");
    // }





  //  $.post("config/process.php", canvasData);
    // alert(canvasData);
 //   window.location.href = "config/process.php?canvasData=" + canvasData;

    // if (photo.setAttribute("gallery/example.png", canvasData)){
    //     alert(canvasData);
    // } else {
    //     alert("bad");
    // };

    // var ajax = new XMLHttpRequuest();
    // ajax.open("POST", "config/process.php", true);
    // ajax.setRequestHeader("Content-type", "application")
    // $.post("save.php", {data: canvas.toDataURL("image/png")});









// save to gallery function to save the picture to database
// function saveToGallery(){
//       var canvas = document.getElementById("posts");
//       var data = canvas.toDataURL("image/png");
//       photo.setAttribute("src", data);
//       var dir = "../gallery/";



   // var dataURL = canvas.toDataURL('image/png');
   
        //image.src = canvas.toDataURL("image/png");
      //window.location.href = image; 
