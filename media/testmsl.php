<html>

<head>
  <link rel="stylesheet" href="video-js.css">
  <meta charset="utf-8">
  <title>Video.js demo loss of audio synch w/ .m3u8 in Chrome</title>
  <script type="text/javascript" src="video.js"></script>
  <script type="text/javascript" src="https://79423.analytics.edgekey.net/ma_library/html5/html5_malibrary.js"></script> 
</head>

<?php
  ini_set('display_errors', 1);
  $output = exec("python ../EdgeAuth-Token-Python/cms_edgeauth.py -k 982923bc39808fc6112d654e9f7cfd5e4ff279886f77ad10bd3411bdb158e817 -w 5000 -u / -x");
  $addr="https://acc.level1.id/master.m3u8?hdnts=".$output;
  //echo $addr;
  //setcookie("hdnts", "exp=1630213969~acl=/*~hmac=510bba0f822564f5798d402d6513a7cedf34339055e1199ec4808c879ec88eb0");
  header ("Set-Cookie: hdnts=".$output);
?>

<body>
  <p id="demo"></p>
  <div id="container"></div>
  <video id="video" controls></video>
  <script>
    //==================================================
    //REST JSON
    const url = 'https://testing18.level1.id/token/api/post/update.php';
      const data = { id: "100007", firstname: "Rizkih", lastname: " ", email: "rizki.hamonangan@outlook.com", tokenlive: "1234",tokenvod: "2323", reg_date: "2021-08-29 20:56:27"};
      fetch(
          url,
          {
              headers: { "Content-Type": "application/json" },
              body: JSON.stringify(data),
              method: "POST"
          }
      )
      .then(data => data.json())
      .then((json) => {
          alert(JSON.stringify(json));
      }); 
    //===================================================

    //===================================================
    //testing capture OS version
    //function getAndroidVersion(ua) {
    //  ua = (ua || navigator.userAgent).toLowerCase(); 
    //  var match = ua.match(/android\s([0-9\.]*)/i);
    //  return match ? match[1] : undefined;
    //};

    //getAndroidVersion(); //"4.2.1"
    //container.innerHTML = getAndroidVersion();
    //===================================================
    //parseInt(getAndroidVersion(), 10); //4
    //parseFloat(getAndroidVersion()); //4.2
    //====================================================


  </script>
</body>

</html>
