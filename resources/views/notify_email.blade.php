<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <h1>Bạn có đơn hàng {{ $mailData['type'] }} từ {{ $mailData['name'] }}. Vui lòng kiểm gia giao dịch tại</h1>
    <a href="{{ $mailData['type'] === 'photo' ? route('admin.orders.photos') : route('admin.orders.products') }}"
        class="btn bg-info">Click vào đây</a>
</body>

</html>
