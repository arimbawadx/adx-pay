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
      <h5 align="center" class="card-title" style="margin-top: 30px;">adx-company<br><p style="font-size: 10px">Data Login Customer Services</p></h5>
      <hr>
      <br>
        <h1>{{$emailDataLogin['title']}}</h1>
        <p style="text-align: justify;"> Yang terhormat Bapak/Ibu {{$emailDataLogin['nama']}}, <br><br>Terima kasih telah menjadi customer services kami, silahkan login pada link http://bit-timeline.epizy.com atau download aplikasi android pada link https://s.id/download-bit-timeline-apk untuk bertransaksi, <br><br><br>
            username    : {{$emailDataLogin['username']}}<br>
            password    : {{$emailDataLogin['password']}}</p>
            <br><br>
            <hr>
        <h5 align="center" class="card-title" style="margin-top: 30px;">Copyright adxCompany | {{date('Y')}} </h5>
    </div>
</body>
</html>