<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
    }

    public function addressUser()
    {
        $address = Address::where('user_id',Auth::id())->first();

        return view('account.addressuser',array(
            'addresses' =>$address
        ));
    }

    public function listOrders()
    {  
        $listOrders = Order::where('user_id',Auth::id())->with('products')->get();   
        return view('account.listsorders',array(
            'listsorders' => $listOrders
        ));
    }
}
