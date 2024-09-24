<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Success</title>
</head>
<body>
    <h1>Booking Confirmed!</h1>
    <p>Thank you for your booking!</p>
    <p>Your seat has been successfully booked.</p>
    <ul>
        <li>Route: {{ session('route_name') }}</li>
        <li>Seat Number: {{ session('seat_number') }}</li>
        <li>Customer Name: {{ session('customer_name') }}</li>
    </ul>
    <a href="{{ route('booking.index') }}">Book Another Ticket</a>
</body>
</html>
