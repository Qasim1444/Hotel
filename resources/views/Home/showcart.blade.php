

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
          rel="stylesheet">

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
            <table class=" mt-5 table table-bordered table-hover table-striped text-center">
                <thead class="table-warning">
                    <tr>
                        <th scope="col">Food Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
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
                    @endforeach
                </tbody>
            </table>


            <div align="center" style="padding:10px">
                <div style="padding:16px;">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div style="padding:16px">
                    <label>Phone</label>
                    <input type="number" name="phone" placeholder="Phone Number" required>
                </div>
                <div style="padding:16px">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address" required>
                </div>
                <div style="padding:10px">
                    <button style="background-color:#FB5849;" type="submit" value="confirm order" class="btn btn-primary">Pay Using Card</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- jQuery -->

@include('Home.js')

</body>
</html>
