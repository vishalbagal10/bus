<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seat</title>
    <style>
        .seat {
            display: inline-block;
            border: 2px solid green;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
        }
        .selected {
            border-color: red;
        }
        .disabled {
            border-color: gray;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Select Your Seat for {{ $route->start_location }} to {{ $route->end_location }}</h1>
    <form action="{{ route('booking.confirm') }}" method="POST" id="bookingForm">
        @csrf
        <div>
            <h3>Prices</h3>
            <ul>
                <li>Single Seat Price: ₹{{ $route->price_single }}</li>
                <li>Double Seat Price: ₹{{ $route->price_double }}</li>
            </ul>
        </div>

        <div>
            <label for="name"><h3>Enter Customer's Name:</h3> </label>
            <input type="text" name="customer_name" placeholder="Customer Name" required><br><br>
        </div>

        <div>
            <h3>Seat Availability: </h3>
            @foreach ($seats as $seat)
                <div class="seat-container">
                    <input type="radio" name="seat_id" value="{{ $seat->id }}" id="seat-{{ $seat->id }}" class="seat-input" {{ $seat->is_booked ? 'disabled' : '' }} data-seat-number="{{ $seat->seat_number }}">
                    <label for="seat-{{ $seat->id }}" class="seat {{ $seat->is_booked ? 'disabled' : '' }}">{{ $seat->seat_number }} - {{ $seat->seat_type }} Seat</label>
                </div>
            @endforeach
        </div><br>

        <button type="submit">Confirm Booking</button><br><br>
    </form>

    <script>
        document.querySelectorAll('.seat-input').forEach(seatInput => {
            seatInput.addEventListener('change', function() {
                document.querySelectorAll('.seat').forEach(seat => {
                    seat.classList.remove('selected');
                });
                if (this.checked) {
                    const label = document.querySelector(`label[for="${this.id}"]`);
                    label.classList.add('selected');
                }
            });
        });

/*         document.querySelectorAll('.seat-input').forEach(seatInput => {
            seatInput.addEventListener('change',function(){
                document.querySelectorAll('.seat').forEach(seat => {
                    seat.classList.add('selected');
                });
                if(this.checked){
                    const label = document.querySelector(`label[for="${this.id}"]`);
                    label.classList.add('selected');
                }
            });
        }); */

    </script>
</body>
</html>
