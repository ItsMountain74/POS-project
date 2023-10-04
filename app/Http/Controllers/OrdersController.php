<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class OrdersController extends Controller
{
    public function getProd(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $products = Product::all();
        return view('orders.newOrder', compact('products'));
    }


    public function placeOrder(Request $request): Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector|Exception
    {
        $products = Product::all();
        $selledProducts = '';
        $totalPrice = 0;
        $qnt = '';
        $check = false;
        foreach ($products as $prod) {
            $var = $prod->name;
            $var .= 'qnt';
            if ($request->$var && $request->$var <= $prod->qnt) {
                $check = true;
                $selledProducts .= $prod->name;
                $selledProducts .= ',';
                $totalPrice += $prod->price * $request->$var;
                $qnt .= $request->$var;
                $qnt .= ',';
                $prod->qnt -= $request->$var;
                $prod->save();
            } elseif ($request->$var && $request->$var >= $prod->qnt) {
                return redirect('/newOrder')->with('msg', 'No enough ' . $prod->name . ' to place the order');
            }
        }
        if (!$check)
            return redirect('/newOrder')->with('msg', 'You can\'t place empty order');
        try {
            Orders::create([
                'products' => $selledProducts,
                'qnt' => $qnt,
                'total_price' => $totalPrice,
            ]);
            return redirect('/newOrder')->with('msg', 'Order Placed Successfully');
        } catch (Exception $e) {
            return $e;
        }

    }


    public function show(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $orders = Orders::all();
        return view('orders.show', compact('orders'));
    }


    public function printOrder(Request $request)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $order_id = $request->id;
        $order = Orders::find($order_id);
        try {
            return $order;
        } catch (Exception $e) {
            return $e;
        }
    }
}
