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
use Illuminate\Support\Str;
class HomeController extends Controller
{

    public function commentstore(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'body' => 'required',
        ]);

        if (auth()->check()) {
            $input['user_id'] = auth()->user()->id;
            Comment::create($input);
            return back();
        } else {
            return redirect()->route('login')->with('error', 'You need to be logged in to comment.');
        }
    }
    public function showByCategoryPost($title)
    {
        $title = str_replace('-', ' ', urldecode($title));
        $user_id = Auth::id();
        $count = cart::where('user_id', $user_id)->count();
        $categories = Category::all();

        $categorie = Post::with('categories')->where('title', $title)->firstOrFail();
        $post = Post::where('title', $title)->firstOrFail();
        $tags = $post->tags;
        $posts = Post::all();
        return view('Home.showByCategoryPost', compact('post', 'categories', 'count', 'tags', 'posts', 'categorie'));
    }

    public function singleblog($title)
    {
        $title = str_replace('-', ' ', urldecode($title));
        $categories = Category::all();
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        $posts = Post::where('title', $title)->firstOrFail(); // Find post by title
        $tags = $posts->tags; // Get tags for the post
        $categorie= $posts->categories;
        $post = Post::all(); // Get all posts
        return view('Home.singlepost', compact('posts', 'post', 'tags', 'categories', 'count','categorie'));
    }


    public function blog() {
        $categories = Category::all();
        $user_id = Auth::id();
        $count = cart::where('user_id', $user_id)->count();
        $post=Post::all();
        return view('Home.blog',compact('post','count','categories'));

    }
    public function showByCategory($name)
    {
        $categories = Category::all();
        $category = Category::where('name', $name)->firstOrFail();
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        $posts = $category->posts; // Assuming you have a relationship set up

        return view('Home.showByCategory', compact('posts', 'category', 'categories', 'count'));
    }


    public function index()
    {
        if (Auth::id()) {
            return redirect('redirect');
        }
        else{
            $categories = Category::all();
            $post=Post::all();
        $food = Food::all();
        $chief = Chief::all();
        return view('Home.layout', compact('food'), compact('chief','post','categories','food'));
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
            $categories = Category::all();
            $post=Post::all();
            return view('Home.layout', compact('food', 'chief', 'count','post','categories'));
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

        $categories = Category::all();
        $food = Food::all();
        $chief = Chief::all();
        $count=cart::where('user_id',$id)->count();
        $id = Auth::id();
        $data = DB::table('carts')
        ->where('carts.user_id', $id)
        ->join('food', 'carts.food_id', '=', 'food.id')
        ->select('carts.*', 'food.title', 'food.price')
        ->get();
        return view('Home.showcart',compact('count','data','food','chief','categories'));

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


}
