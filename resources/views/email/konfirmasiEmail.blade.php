<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konfirmasi Paket Tiba</title>
</head>
<body>
    <h1>Konfirmasi Paket Tiba</h1>

    <p>Dear Customer, <br>

        Paket kamu sudah tiba, dengan nomor resi <b>{{ $mailData['no_resi'] }}</b> mohon untuk dikonfirmasi ya. <br>

        <a href="http://127.0.0.1:8000/pelanggan/konfirm/{{$mailData['no_resi']}}" target="__blank">klik di sini</a> untuk konfirmasi paket.
    </p>
    {{-- <p>No Resi: {{ $mailData['no_resi'] }}</p> --}}
    {{-- <p>DOB: {{ $mailData['dob'] }}</p> --}}
</body>
</html>
