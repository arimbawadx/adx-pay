<html>
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
    <!-- https://www.mynotescode.com/mengirim-email-localhost-atau-server-php/ -->
    <!-- <div style="float: left;margin-right: 10px;">
        <img src="cid:logo_mynotescode" alt="Logo" style="height: 50px">
    </div>
    <h2 style="margin-bottom: 0;">My Notes Code</h2>
    https://www.mynotescode.com
    <div style="clear: both"></div>
    <hr /> -->
    <div style="text-align: center;">
      <h5 align="center" class="card-title" style="margin-top: 30px;">PT. Bali Internasional Teknologi <br><p style="font-size: 10px">Data Login Customer Service</p></h5>
      <hr>
      <br>
        <h1>{{$emailDataLogin['title']}}</h1>
        <p style="text-align: justify;"> Yang terhormat Customer Service {{$emailDataLogin['nama']}}, <br><br>Silahkan login pada link http://bit-timeline.epizy.com atau download aplikasi android pada link shttps://s.id/download-bit-timeline-apk untuk akses halaman Customer Service, <br><br><br>
            username    : {{$emailDataLogin['username']}}<br>
            password    : {{$emailDataLogin['password']}}</p>
            <br><br>
            <hr>
        <h5 align="center" class="card-title" style="margin-top: 30px;">Copyright PT. Bali Internasional Teknologi | 2020 </h5>
    </div>
</body>
</html>