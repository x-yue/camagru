let headlines = [
    "Cheese :)",
    "Fromage =P",
    "Smile!",
    "Take a Picture!",
    "Don't be shy",
    "Click and upload"];

// this function will show a random headline
randomHeadline = function () {
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

function takeAPicture(){
  if (filterAdded === 1)
  {  
      var canvas = document.getElementById("gallery");
      //var image = new Image();
      var ctx = canvas.getContext("2d");
      var image = document.getElementById("canvas_container");
      ctx.drawImage(image, 5, 5);
      //ctxl.stroke();
      //image.src = canvas.toDataURL("image/png");
      //window.location.href = image;
   //   saveToGallery();
    
   /* var canvas = document.getElementById("screen")
      var table = canvas.msGetInputContext("2d");
      var mirror = document.getElementById("addon")

      mirror.addEventListener("contextmenu", function(e){
          var dataURL = canvas.toDataURL('image/png');
          mirror.src = dataURL;*/
    //  });
    //  window.localhost.href = image;
      
//        window.open('', document.getElementById('screen').toDataURL("image/png"));
  }
  else {
      alert("You have to add one of filters above to your picture.");
  }
}

function saveToGallery(){

}





//function popUp(id, text){
//  document.getElementById(id).innerHTML = text;
//}


/*
window.addEventListener('load', function() {
  document.querySelector('input[type="file"]').addEventListener('change', function() {
      if (this.files && this.files[0]) {
          var img = document.querySelector('img');  // $('img')[0]
          img.src = URL.createObjectURL(this.files[0]); // set src to file url
          img.onload = imageIsLoaded; // optional onload event listener
      }
  });
});

function imageIsLoaded(e) { alert(e); }
*/

/*
takeAPicture = function() {
    var streaming = false,
        video        = document.querySelector('#video'),
        cover        = document.querySelector('#cover'),
        canvas       = document.querySelector('#canvas'),
        photo        = document.querySelector('#photo'),
        startbutton  = document.querySelector('#startbutton'),
        width = 320,
        height = 0;
  
    navigator.getMedia = ( navigator.getUserMedia ||
                           navigator.webkitGetUserMedia ||
                           navigator.mozGetUserMedia ||
                           navigator.msGetUserMedia);
    navigator.getMedia(
      {
        video: true,
        audio: false
      },
      function(stream) {
        if (navigator.mozGetUserMedia) {
          video.mozSrcObject = stream;
        } else {
          var vendorURL = window.URL || window.webkitURL;
          video.src = vendorURL.createObjectURL(stream);
        }
        video.play();
      },
      function(err) {
        console.log("An error occured! " + err);
      }
    );
  
    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);
  
    function takepicture() {
      canvas.width = width;
      canvas.height = height;
      canvas.getContext('2d').drawImage(video, 0, 0, width, height);
      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);
    }
  
    startbutton.addEventListener('click', function(ev){
        takepicture();
      ev.preventDefault();
    }, false);
};

*/
