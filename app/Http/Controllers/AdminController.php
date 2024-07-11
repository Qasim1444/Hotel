<?php

namespace App\Http\Controllers;

use App\Models\Chief;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{

    public function index()
    {
        return view('Home.layout');
    }


    public function userdata()
    {
        $data = User::all();
        return view('admin.userdata', compact('data'));
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function edituser($id)
    {
        $data = User::find($id);
        return view('admin.edituser', compact('data'));
    }

    public function updateuser($id, Request $request)
    {

        $data = User::find($id);
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['phone'] = $request['phone'];
        $data['address'] = $request['address'];
        $data->save();
        return redirect()->back()->with('message', 'user update successful');
    }

    public function adminmenu()
    {
        $menu = Food::all();
        return view('admin.adminmenu', compact('menu'));
    }

    public function addmenu(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',


        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('image'), $file_name);

        $menu = new Food;

        $menu->title = $request->title;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->image = $file_name;

        $menu->save();

        return redirect('adminmenu')->with('success', 'Menu Added successfully.');

    }

    public function destroymenu($id)
    {
        $menu = Food::find($id);
        $menu->delete();
        return redirect()->back();
    }

    public function editmenu($id)
    {
        $menu = Food::find($id);
        return view('admin.editmenu', compact('menu'));
    }

    public function updatemenu(Request $request, $id)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'price' => 'required',

            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',


        ]);

        $image = $request->hidden_image;

        if ($request->image != '') {
            $image = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('image'), $image);
        }


        $menu = Food::find($id);
        $menu['title'] = $request['title'];
        $menu['description'] = $request['description'];
        $menu['price'] = $request['price'];
        $menu['image'] = $image;


        $menu->save();
        return redirect()->back()->with('message', 'menu update successful');
    }

    public function adminreservation()
    {
        $reservation = Reservation::all();
        return view('admin.adminreservation', compact('reservation'));
    }

    public function addreservation(Request $request)
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

        return redirect('adminreservation')->with('success', 'Menu Added successfully.');

    }

    public function destroyreservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back();
    }

    public function editreservation($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.editreservation', compact('reservation'));
    }

    public function updatereservation(Request $request, $id)
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


        $reservation = Reservation::find($id);
        $reservation['name'] = $request['name'];
        $reservation['email'] = $request['email'];
        $reservation['phone'] = $request['phone'];
        $reservation['guest'] = $request['guest'];
        $reservation['time'] = $request['time'];
        $reservation['message'] = $request['message'];


        $reservation->save();
        return redirect()->back()->with('reservation', 'menu update successful');
    }

    public function adminchief()
    {
        $chief = Chief::all();
        return view('admin.adminchief', compact('chief'));
    }

    public function addchief(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'Specialty' => 'required',

            'image' => 'required',


        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('image'), $file_name);

        $chief = new Chief;

        $chief->name = $request->name;

        $chief->Specialty = $request->Specialty;
        $chief->image = $file_name;

        $chief->save();

        return redirect('adminchief')->with('success', 'chief Added successfully.');

    }

    public function destroychief($id)
    {
        $chief = Chief::find($id);
        $chief->delete();
        return redirect()->back();
    }

    public function editchief($id)
    {
        $chief = Chief::find($id);
        return view('admin.editchief', compact('chief'));
    }

    public function updatechief(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',

            'Specialty' => 'required',

            'image' => 'image',


        ]);

        $image = $request->hidden_image;

        if ($request->image != '') {
            $image = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('image'), $image);
        }


        $chief = Chief::find($id);
        $chief['name'] = $request['name'];

        $chief['Specialty'] = $request['Specialty'];
        $chief['image'] = $image;


        $chief->save();
        return redirect()->back()->with('message', 'chief update successful');
    }


    public function adminorder()
    {
        $order = order::all();
        return view('admin.adminorder', compact('order'));
    }

    public function addorder(Request $request)
    {
        $request->validate([
            'foodname' => 'required',
            'price' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);


        $order = new order;

        $order->foodname = $request->foodname;
        $order->price = $request->price;
        $order->name = $request->name;
        $order->quantity = $request->quantity;
        $order->phone = $request->phone;
        $order->address = $request->address;

        $order->save();

        return redirect('adminorder')->with('success', 'order Added successfully.');

    }

    public function destroyorder($id)
    {
        $order = Order::find($id);;
        $order->delete();
        return redirect()->back();
    }

    public function editorder($id)
    {
        $order =Order::find($id);
        return view('admin.editorder', compact('order'));
    }

    public function updateorder(Request $request, $id)
    {
        $request->validate([
            'foodname' => 'required',
            'price' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $order = Order::find($id);

        $order->update([
            'foodname' => $request->input('foodname'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect()->back()->with('message', 'Order update successful');
    }
    public function search(Request $request)
    {
        $search = $request->search;

        $order = Order::where('name', 'like', '%' . $search . '%')
            ->orWhere('foodname', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%')
            ->orWhere('quantity', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->get();

        return view('admin.adminorder', compact('order'));
    }
    public function tag()
    {
        $tag =Tag::all();
        return view('admin.tag',compact('tag'));
    }

    public function tagstore(Request $request)
    {

        $request->validate([
            'name' => 'required|string',

        ]);

        Tag::create($request->all());

        return redirect()->back()->with('success', 'tag created successfully!');

}
    public function deletetag($id)
    {
        $tag = tag::find($id);
        $tag->delete();

        return redirect()->back()->with('success', 'tag DELETE successfully . ');

    }

    public function edittag($id)
    {
        $tag = Tag::find($id);
        return view('Admin.edittag', compact('tag'));
    }

    public function updatetag($id, Request $request)
    {

        $tag = tag::find($id);
        $tag->name = $request->input('name');


        $tag->save();
        return redirect()->back()->with('message', 'tag update successful');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('Admin.categories',compact('categories'));
    }
    public function categoriesstore(Request $request)
    {

        $request->validate([
            'name' => 'required|string',

        ]);

        Category::create($request->all());

        return redirect()->back()->with('success', 'Categories created successfully!');

    }
    public function deletecategories($id)
    {
        // Find the category
    $category = Category::find($id);

    if ($category) {
        // Delete all related posts
        Post::where('category_id', $id)->delete();

        // Delete the category
        $category->delete();

        return redirect()->back()->with('success', 'Category and related posts deleted successfully.');
    }

    return redirect()->back()->with('error', 'Category not found.');

    }

    public function editcategories($id)
    {
        $categories = Category::find($id);
        return view('Admin.editCategories', compact('categories'));
    }

    public function updatecategories($id, Request $request)
    {

        $categories = Category::find($id);
        $categories->name = $request->input('name');


        $categories->save();
        return redirect()->back()->with('message', 'tcategoriesupdate successful');
    }



    public function post()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::all();
        return view('Admin.Post', compact('categories'), compact('tags','posts'));
    }

    public function poststore(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:3000'],
                'status' => ['required', 'integer', 'max:255'],
                'category' => ['required', 'integer', 'max:255'],
                'tags' => ['required', 'array'],
                'tags.*' => ['required', 'string', 'max:255'],
                'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'] // Adjust max file size as needed
            ]);

            // Handle image upload

            $file_name = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('image'), $file_name);

            $post = Post::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category,
                'image' => $file_name // Store image path in the database
            ]);

            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withErrors($ex->getMessage());
        }

        return redirect()->back()->with('success', 'Post successfully created.');
    }
    public function deletepost($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect()->back()->with('success', 'posts DELETE successfully . ');

    }

    public function editpost($id)
    {
        $posts = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('Admin.editposts', compact('categories'), compact('tags','posts'));

    }

    public function updatepost($id, Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:3000'],
                'status' => ['required', 'integer', 'max:255'],
                'category' => ['required', 'integer', 'max:255'],
                'tags' => ['required', 'array'],
                'tags.*' => ['required', 'string', 'max:255']
            ]);

            $post = Post::findOrFail($id);

            $image = $post->image; // Default to the existing image

            if ($request->hasFile('image')) {
                $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('image'), $image);
            }

            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category,
                'image' => $image // Store image path in the database
            ]);

            // Sync the tags for the post
            $post->tags()->sync($request->tags);

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();

            return back()->withErrors($ex->getMessage());
        }

        return redirect()->back()->with('success', 'Post successfully updated.');
    }




}
