<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking</title>
</head>
<body>
    <h1>Online Bus Booking System</h1>
    <form action="{{ route('booking.select_seats') }}" method="POST">
        @csrf
        <label for="route">Select Route:</label>
        <select name="route_id" id="route">
            <option value="">Select Destination</option>
            @foreach ($routes as $route)
                <option value="{{ $route->id }}">{{ $route->start_location }} to {{ $route->end_location }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Select Seat</button>
    </form>
</body>
</html>
