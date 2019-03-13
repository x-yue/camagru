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

function removeUpload(){
  image = document.getElementById("upload");
  image.src = null;
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

function takeAPicture(){
  if (filterAdded === 1)
  {
   // var canvas = document.createElement("canvas");
  // /*  canvas.id = "canvasPhoto";
  //   canvas.width = 500;
  //   canvas.height = 500;
  //   canvas.onlick = pasteSticker;} */
    //  var image = document.getElementById("upload");

  //   var canvas = document.createElement("canvas");
    //  canvas.id = "gallery";
//      document.getElementById('gallery').inerHTML = "<canvas onclick='selectPicture()' id='posts'></canvas>";


      var canvas = document.getElementById("posts");
      var camerastream = document.getElementById("camerastream");
      var addon = document.getElementById("addon");
      var upload = document.getElementById("upload");
      var ctx = canvas.getContext("2d");
      ctx.drawImage(camerastream, 0, 0, 300, 150);
      ctx.drawImage(upload, 0, 0, 300, 150);
      ctx.drawImage(addon, 0, 0, 300, 150);

   // var dataURL = canvas.toDataURL('image/png');
    //  ctx.drawImage(image1, 0, 0, 300, 200);
    //  ctx.drawImage(camerastream , 0,0, 1280, 720, 0, 0, 800, 720 );
      // ctx.drawImage(upload , 0,0, 1280, 720, 0, 0, 750, 500 );
 
    // ctx.drawImage(camerastream, 0,0);

//     ctx.drawImage(upload, 0,0);
    //  ctx.drawImage(addon, 0, 0, 500, 500);
        //image.src = canvas.toDataURL("image/png");
      //window.location.href = image; 

  }  
  else {
      alert("You have to add one of filters above to your picture.");
  }
}

// Function to take the picture from loic
function replaceVideo() {
	var canvas = document.createElement("canvas");
	canvas.id = "canvasPhoto";
	canvas.width = 640;
	canvas.height = 480;
  canvas.onclick = pasteSticker;
  
	// 	importImg.onload = function () {
	// 		canvas.getContext('2d').drawImage(importImg, 0, 0, 640, 480);
	// 		origImg.src = canvas.toDataURL();
	// 	}
	if (importImg) {
		importImg.onload = function () {
			canvas.getContext('2d').drawImage(importImg, 0, 0, 640, 480);
			origImg.src = canvas.toDataURL();
		}
	}
	else {
		canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
		origImg.src = canvas.toDataURL();
	}
	document.getElementById("camera").appendChild(canvas);
	video.parentNode.removeChild(video);
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
