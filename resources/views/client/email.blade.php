<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    <title>Đặt phòng thành công</title>
</head>
<body class="container">
    <h1 class="text-center">Thông báo đặt phòng thành công</h1>
    <p>Xin chào {{ $booking->name }}</p>
    <p>Cảm ơn quý khách đã đặt phòng thành công bên khách sạn chúng tôi. Dưới đây là thông tin đặt phòng của bạn:</p>
    <p>Tên phòng: {{ $booking->room->name }}</p>
    <p>Số phòng: {{ $booking->room->id }}</p>
    <p>Ngày nhận phòng: 3PM {{ $booking->start_date }}</p>
    <p>Ngày trả phòng: 10AM {{ $booking->end_date }}</p>
    @php
    $amount = $booking->total_price; // Số tiền cần hiển thị
    $formattedAmount = number_format($amount, 0, ',', '.'); // Định dạng số tiền
@endphp
    <p>Tổng tiền quý khách sẽ thanh toán trực tiếp tại quầy: {{ $formattedAmount }}đ</p>
    <p>Xin cảm ơn!</p>
</body>
</html>
