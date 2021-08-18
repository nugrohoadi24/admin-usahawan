<!DOCTYPE html>
<html>
<head>
    <title>info@pasarkitasemua.org</title>
</head>
<body>
    Halo <i>{{ $details->receiver }}!</i>,
    <br>
    <p>Kami telah menerima laporan anda dengan detail sebagai berikut,</p>
    <br>
    <div>
    <p><b>Nama Anda :</b>&nbsp;{{ $details->demo_one }}</p>
    <p><b>Email:</b>&nbsp;{{ $details->demo_two }}</p>
    <p><b>Kasus:</b>&nbsp;{{ $details->demo_two }}</p>
    </div>
    <p>Orang yang Anda Laporkan,</p>

    <div>
    <p><b>Terlapor:</b>&nbsp;{{ $testVarOne }}</p>
    <p><b>Email:</b>&nbsp;{{ $testVarTwo }}</p>
    <p><b>Total Kerugian:</b>&nbsp;{{ $testVarTwo }}</p>
    </div>
    <br>
    <p>Saat ini laporan anda sedang kami proses, mohon ditunggu proses selanjutnya</p>
    Terimakasih atas laporan anda,
    <br/>
    <i>{{ $details->sender }}</i>
</body>
</html>