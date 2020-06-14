<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Catogory;
use App\Contact;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator, Redirect, Response;

class PagesController extends Controller
{
    //function to call the products and catogories to show in the index page by using the models Product and Catogory

    public function index()
    {
        $items = Product::all();
        $categories = Catogory::all();

        return view('pages.index', ['items' => $items, 'categories' => $categories]);
    }

    public function search(Request $request)
    {
        $name = $request->search;
        if (is_numeric($name)) {
            $items = Product::where('price', '<=', $name)->get();
        } else {
            $items = Product::where('name', 'like', $name . '%')->get();
        }

        return view('pages.search', ['items' => $items, 'name' => $name]);
    }
    public function searchget($name)
    {
        if (is_numeric($name)) {
            $items = Product::where('price', '<=', $name)->get();
        } else {
            $items = Product::where('name', 'like', $name . '%')->get();
        }
        return view('pages.search', ['items' => $items, 'name' => $name, 'success' => 'Added to Cart']);
    }

    //Function to show the veg items from the database
    public function veg()
    {
        $items = Product::where('categoryid', '=', 1)->get();
        // $categories = Catogory::all();
        // $items = DB::table('users').all();
        // $namitha = "Namitha";
        return view('pages.veg', ['items' => $items]);
    }

    //Function to show the nonveg items from the database
    public function nonveg()
    {
        $items = Product::where('categoryid', '=', 2)->get();
        // $categories = Catogory::all();
        // $items = DB::table('users').all();
        // $namitha = "Namitha";
        // return $items;
        return view('pages.nonveg', ['items' => $items]);
    }

    //Function to show the drinks from the database
    public function drinks()
    {
        $items = Product::where('categoryid', '=', 3)->get();
        // $items = DB::table('users').all();
        // $namitha = "Namitha";
        // return $items;
        return view('pages.drinks', ['items' => $items]);
    }

    public function desserts()
    {
        $items = Product::where('categoryid', '=', 4)->get();
        // $items = DB::table('users').all();
        // $namitha = "Namitha";
        // return $items;
        return view('pages.drinks', ['items' => $items]);
    }

    public function products()
    {
        // $items = DB::table('items')->where('categoryid','1')->get();
        return view('products');
    }


    public function contact()
    {
        // $items = DB::table('items')->where('categoryid','1')->get();
        return view('pages.contact');
    }


    //Function to add items to the cart by using id --Create
    public function addCart($id)
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $check = Cart::where('pid', $id)->where('userid', $userid)->where('status', 0)->count();
            // return $check;
            if ($check > 0) {
                $results = Cart::where('pid', $id)->where('userid', $userid)->where('status', 0)
                    ->select('quantity')->first();

                $quantity = $results->quantity;

                Cart::where('pid', $id)->where('userid', $userid)->where('status', 0)
                    ->update(['quantity' => $quantity + 1]);
            } else {
                $cart = new Cart();
                $cart->pid = $id;
                $cart->quantity = 1;
                $cart->userid = $userid;
                $cart->status = 0;
                $cart->optionid = 0;
                $cart->save();
            }
            //return Redirect::to('cart/'.$userid);
            // return Redirect::to('/')->withSuccess('Added To Cart');
            return redirect()->back()->withSuccess('Added to Cart');

            // return $id;

        } else {
            return Redirect::to("login");
        }
    }
    // 

    public function addCartSearch($id, $name)
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $check = Cart::where('pid', $id)->where('userid', $userid)->where('status', 0)->count();
            //return $check;
            if ($check > 0) {
                $results = Cart::where('pid', $id)->where('userid', $userid)->where('status', 0)
                    ->select('quantity')->first();

                $quantity = $results->quantity;

                Cart::where('pid', $id)->where('userid', $userid)->where('status', 0)
                    ->update(['quantity' => $quantity + 1]);
            } else {
                $cart = new Cart();
                $cart->pid = $id;
                $cart->quantity = 1;
                $cart->userid = $userid;
                $cart->status = 0;
                $cart->optionid = 0;
                $cart->save();
            }
            //return Redirect::to('cart/'.$userid);
            // return Redirect::to('/')->withSuccess('Added To Cart');
            return Redirect::to("searchget/" . $name);
            // return $id;

        } else {
            return Redirect::to("login");
        }
    }




    //Function for showing all the cart items using user id --Read
    public function showCart($userid)
    {
        $carts = Cart::select(
            'carts.id',
            'carts.pid',
            'carts.quantity',
            'carts.created_at',
            'products.price',
            'products.name',
            'users.name as uname',
            DB::raw('products.price*carts.quantity as tprice')
        )
            ->join('products', 'products.id', '=', 'carts.pid')
            ->join('users', 'users.id', '=', 'carts.userid')
            ->where('userid', '=', $userid)
            ->where('status', '=', 0)
            ->get();

        $total = Cart::join('products', 'products.id', '=', 'carts.pid')
            ->join('users', 'users.id', '=', 'carts.userid')
            ->where('userid', '=', $userid)
            ->where('status', '=', 0)
            ->sum(DB::raw('products.price*carts.quantity'));

        $data = array(
            'result' => $carts,
            'total' => $total
        );
        // return $carts;  
        return view('pages.cart', ['carts' => $data]);
    }

    //Function for showing the order that already purchased 
    public function showOrder($userid)
    {
        $carts = Cart::select(
            'carts.id',
            'carts.pid',
            'carts.quantity',
            'carts.optionid',
            'carts.created_at',
            'carts.updated_at',
            'products.name',
            'users.name as uname',
            'products.price',
            DB::raw('products.price*carts.quantity as tprice')
        )
            ->join('products', 'products.id', '=', 'carts.pid')
            ->join('users', 'users.id', '=', 'carts.userid')
            ->where('userid', '=', $userid)
            ->where('status', '=', 1)
            // ->orderBY('carts.updated_at')
            ->get();

        $total = Cart::join('products', 'products.id', '=', 'carts.pid')
            ->join('users', 'users.id', '=', 'carts.userid')
            ->where('userid', '=', $userid)
            ->where('status', '=', 1)
            ->sum(DB::raw('products.price*carts.quantity'));

        $data = array(
            'result' => $carts,
            'total' => $total
        );
        // return $carts;  
        return view('pages.order', ['carts' => $data]);
    }

    //Function to delete items from the cart --delete
    public function deletecart($id, $userid)
    {
        Cart::where('id', '=', $id)->delete();
        $data = $this->showcart($userid);
        return $data;
    }

    //function for updating carts status from 0 to 1 --update
    public function addOrder($userid, $optionid)
    {
        $carts = Cart::select(
            'carts.id',
            'carts.pid',
            'carts.created_at',
            'products.name',
            'users.name as uname',
            'products.price'
        )
            ->join('products', 'products.id', '=', 'carts.pid')
            ->join('users', 'users.id', '=', 'carts.userid')
            ->where('userid', '=', $userid)
            ->where('status', '=', 0)
            ->get();

        foreach ($carts as $d) {
            Cart::where('id', $d->id)
                ->update(['status' => 1, 'optionid' => $optionid]);
        }
        return Redirect::to("showcart/" . $userid)->withSuccess('Purchased Successfully');
    }

    //function for insert in the feedback form where you can type queries
    public function insertcontact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->withSuccess('Thank you');
    }
}
