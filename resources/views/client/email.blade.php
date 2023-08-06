<!DOCTYPE html>
<html>
<head>
    <title>Đặt phòng thành công</title>
</head>
<body>
    <h1>Thông báo đặt phòng thành công</h1>
    <p>Xin chào {{ $booking->name }}</p>
    <p>Cảm ơn quý khách đã đặt phòng thành công. Dưới đây là thông tin đặt phòng của bạn:</p>
    <p>Tên phòng: {{ $booking->room->name }}</p>
    <p>Số phòng: {{ $booking->room->id }}</p>
    <p>Ngày nhận phòng: 3PM {{ $booking->start_date }}</p>
    <p>Ngày trả phòng: 10AM {{ $booking->end_date }}</p>
    <p>Tổng giá trị: {{ $booking->total_price }} đ / đêm</p>
    <p>Xin cảm ơn!</p>
</body>
</html>
