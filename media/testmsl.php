<html>

<head>
  <link rel="stylesheet" href="video-js.css">
  <meta charset="utf-8">
  <title>Video.js demo loss of audio synch w/ .m3u8 in Chrome</title>
  <script type="text/javascript" src="video.js"></script>
  <script type="text/javascript" src="https://79423.analytics.edgekey.net/ma_library/html5/html5_malibrary.js"></script> 
</head>

<?php
  //ini_set('display_errors', 1);
  //$output = exec("python ../EdgeAuth-Token-Python/cms_edgeauth.py -k 982923bc39808fc6112d654e9f7cfd5e4ff279886f77ad10bd3411bdb158e817 -w 5000 -u / -x");
  //$output = exec("python ../EdgeAuth-Token-Python/cms_edgeauth.py -k 45deb62c23a35c0d57124bcd1c511a2c -a \"/*\" -w 3600 -n hdnts");
  //$addr="https://acc.level1.id/master.m3u8?hdnts=".$output;
  //echo $addr;
  //setcookie("hdnts", "exp=1630213969~acl=/*~hmac=510bba0f822564f5798d402d6513a7cedf34339055e1199ec4808c879ec88eb0");
  //header ("Set-Cookie: hdnts=".$output);
  include ("get.php");
?>

<body>
<p id="demo"></p>
  <div id="container"></div>
  <video id="video" controls></video>
  <script>
    //testing capture OS version
    //===================================================
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

    var video = document.getElementById('video');
    var pluginInstance = new Html5_AkamaiMediaAnalytics("https://ma1429-r.analytics.edgekey.net/config/beacon-31085.xml");
    pluginInstance.setMediaElement(video);
    // Setting Custom Data
    pluginInstance.setData("title", "testmsl.msl");
    //pluginInstance.setData("eventName", "Game Of Thrones - Season 1 Winter Is Coming");
    pluginInstance.setData("owner", "testing");
    //pluginInstance.setData("device", "iPhone 7");
    //pluginInstance.setData("deliveryType", "L");
    pluginInstance.setData("cdn", "Akamai");
    pluginInstance.setData("AppVersion", "appVersion");
    pluginInstance.setData("appVers", "v1");
  //  pluginInstance.setData("device", "Windows");
    //pluginInstance.setData("category", "TV Shows");
    //pluginInstance.setData("subCategory", "Fantasy Drama");
    //pluginInstance.setData("show", "Game Of Thrones");
    //pluginInstance.setData("contentLength", "3697"); // Value in seconds
    //pluginInstance.setData("playerId", "SamplePlayer01");
    pluginInstance.setViewerId("uniqueIdentifier");
    pluginInstance.setViewerDiagnosticsId("diagnosticIdentifier");
        //pluginInstance.disableLocation();
        //pluginInstance.setStreamURL(videoTag.currentSrc(),true);
    //    */
    var vidadd = "<?php echo $addr; ?>";
    //document.getElementById("demo").innerHTML = vidadd;
    videojs(video).src({
      type: "application/x-mpegURL",
      //withCredentials: true,
      overrideNative: true,
      //src: "https://cc-stream-recordings.s3.amazonaws.com/b-8a572d9253094950/stage799038a5f0c_720p/playlist.m3u8"
      //src:"https://rihamonamslamd.akamaized.net/hls/live/2026730/rihamona/master.m3u8"
      //src: "https://acc.level1.id/master.m3u8?hdnts=exp=1630213969~acl=/*~hmac=510bba0f822564f5798d402d6513a7cedf34339055e1199ec4808c879ec88eb0"
      src: vidadd
      //src: "https://rtmp.level1.id/master.m3u8"
      //src: "https://rtmp.level1.id/master.m3u8?hdnts=exp=1628999567~acl=/*~hmac=4ff5aebb7bba6520685055bcd22868563af803b31438a8fc3cbb0244e34ffbbd"
      //src:"https://testing18.level1.id/media/bunny.mp4"
      //src: "https://c532af53a1e2.eu-west-1.playback.live-video.net/api/video/v1/eu-west-1.811200093185.channel.ko5m726v1Ja4.m3u8"
      //src: "https://ivs.akamaized-staging.net/api/video/v1/eu-west-1.811200093185.channel.ko5m726v1Ja4.m3u8"
  });
  </script>
</body>

</html>
