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
      var data = canvas.toDataURL('image/png');
      document.canvasForm.canvasData.value = data; 
      document.forms["canvasForm"].submit();
    } else {
      alert("You have to add one of filters above to your picture.");
    }
}