<!DOCTYPE html>
<html>
<head>
	<title>GKRSC Code Scanner</title>
<link rel="stylesheet"  href="bootstrap.min.css">
  <script src="js/jquery-3.2.1.min.js"></script>
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="mystyles.css">
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 title bg-primary" >
  <h1 class="text-center ">GKRSC ID Card Scanner</h1>
      </div>

    <div class="col-sm-12 title bg-info hed2 " >
  <h3 class="text-center "> Place QR code infront of your camera.</h3>
      </div>
     
    <div class="col-sm-12 box bg-success"  >
    
    <video id="preview"></video>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        window.location.href = content;
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
		if (cameras.length > 1) { scanner.start(cameras[1]); } else { scanner.start(cameras[0]); }
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>

    </div>
  </div>
</body>
</html>
