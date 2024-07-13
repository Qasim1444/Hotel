<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Chief;
use App\Models\Food;
use App\Models\Order;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use App\Models\Comment;
use Stripe\Checkout\Session;
class HomeController extends Controller
{

    public function commentstore(Request $request)

    {

        $input = $request->all();

        $request->validate([
            'body' => 'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }

    public function singleblog($id)
    {
        $categories=Category::all();
        $tags = Post::findOrFail($id)->tags;
        $posts=Post::find($id);
        $post=Post::all();
        return view('Home.singlepost',compact('posts','post','tags','categories'));
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('redirect');
        }
        else{

        $food = Food::all();
        $chief = Chief::all();
        return view('Home.layout', compact('food'), compact('chief'));
        }
        }


    public function redirect()
    {


        $usertype = Auth::User()->usertype;
        if ($usertype == '1') {

            return view('admin.adminpage');
        } else {
            $user_id = Auth::id();
            $count = cart::where('user_id', $user_id)->count();
            $food = Food::all();
            $chief = Chief::all();
            return view('Home.layout', compact('food', 'chief', 'count'));
        }
    }

    public function addreservationhome(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'guest' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'required',

        ]);

        $reservation = new Reservation;

        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guest = $request->guest;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->message = $request->message;

        $reservation->save();

        return redirect()->back()->with('success', 'Menu Added successfully.');

    }

    public function addcart($id, Request $request)
    {
        if (Auth::id()) {
            $user_id = Auth::id();


            $foodid = $id;

            $quantity = $request->quantity;

            $cart = new Cart;
            $cart->user_id = $user_id;

            $cart->food_id = $foodid;

            $cart->quantity = $quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function showcart($id, Request $request)
    {
        $food = Food::all();
        $chief = Chief::all();
        $count=cart::where('user_id',$id)->count();
        $id = Auth::id();
        $data = DB::table('carts')
        ->where('carts.user_id', $id)
        ->join('food', 'carts.food_id', '=', 'food.id')
        ->select('carts.*', 'food.title', 'food.price')
        ->get();
        return view('Home.showcart',compact('count','data','food','chief'));

    }
    public function remove($id)
    {
        $cart=cart::find($id);

$cart->delete();

return  redirect()->back();

    }
    public function orderconfirm(Request $request)
    {
        // Initialize Stripe with your secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create an array of line items for the Checkout Session
        $line_items = [];
        foreach ($request->foodname as $key => $foodname) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $request->price[$key] * 100, // Stripe uses cents
                    'product_data' => [
                        'name' => $foodname,
                    ],
                ],
                'quantity' => $request->quantity[$key],
            ];

            // Save order details to your database
            $order = new Order;
            $order->foodname = $foodname;
            $order->price = $request->price[$key];
            $order->quantity = $request->quantity[$key];
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->save();
        }
        DB::table('carts')->delete();
        // Create a Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => url('/success'),
            'cancel_url' => url('/cancel'),
        ]);

        // Redirect to Checkout
        return redirect()->to($session->url);
    }
    public function blog() {

        $post=Post::all();
        return view('Home.blog',compact('post'));

    }

}
