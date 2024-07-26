<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Classic Cafe - Restaurant</title>

    @include('Home.css')
</head>

<body>
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    @include('Home.header')


    <script src="https://js.stripe.com/v3/"></script>
    <div class="container my-5">
        <div class="table-responsive">
            <form action="{{ url('orderconfirm') }}" method="post">
                @csrf
                <table class="mt-5 py-5 my-5 pt-5 table table-bordered table-hover table-striped text-center">
                    <thead style="background-color:#FB5849;">
                        <tr style="color: white;">
                            <th scope="col">Food Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $totalAmount = 0;
                    @endphp

                    @foreach ($data as $item)
                        <tr>
                            <td>
                                <input type="text" name="foodname[]" value="{{ $item->title }}" hidden>
                                {{ $item->title }}
                            </td>
                            <td>
                                <input type="text" name="price[]" value="{{ $item->price }}" hidden>
                                ${{ $item->price }}
                            </td>
                            <td>
                                <input type="text" name="quantity[]" value="{{ $item->quantity }}" hidden>
                                {{ $item->quantity }}
                            </td>
                            <td>
                                <a href="{{ url('remove', $item->id) }}" class="btn btn-warning">Remove</a>
                            </td>
                        </tr>

                        @php
                            $totalAmount += $item->price * $item->quantity;
                        @endphp
                    @endforeach

                    <tr>
                        <td colspan="3" style="text-align: right;">Total Amount:</td>
                        <td>${{ $totalAmount }}</td>
                    </tr>

                    </tbody>
                   
                </table>

                <div class="d-flex flex-column align-items-center justify-content-center" >
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
                    </div>
                    <div>
                        <button style="background-color:#FB5849;" type="submit" class="btn btn-primary">Pay Using Card</button>
                    </div>
                </div>


            </form>
        </div>
    </div>

    <!-- jQuery -->
    @include('Home.js')
</body>

</html>
