<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document PDF</title>
</head>
<body>
    <h1>
        Numer faktury: {{ $invoice->number }}
    </h1>
    <h2>
        Kwota: {{ $invoice->total }}
    </h2>
    <h3>
        Data wystawienia: {{ $invoice->date }}
    </h3>
    <h3>Dabe klienta:</h3>
    <p>{{ $invoice->customer->name }}</p>
    <p>{{ $invoice->customer->address }}</p>
    <p>{{ $invoice->customer->nip }}</p>
</body>
</html>
