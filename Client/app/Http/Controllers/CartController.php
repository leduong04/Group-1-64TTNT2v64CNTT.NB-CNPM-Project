<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList(){
        $cartItems = \Cart::getContent();
        $checkInOut = session('check_in_out');
        $numPeople = session('num_people');
    
        $dateRange = explode(' - ', $checkInOut);
        
        if (count($dateRange) == 2) {
            $checkInDate = \Carbon\Carbon::parse($dateRange[0]);
        $checkOutDate = \Carbon\Carbon::parse($dateRange[1]);

        $checkIn = $checkInDate->format('d/m/Y');
        $checkOut = $checkOutDate->format('d/m/Y');
        $numDays = $checkInDate->diffInDays($checkOutDate);
        } else {
            $checkIn = $checkOut = 'Ngày không hợp lệ';
        }
        $Pay = \Cart::getTotal();
        $TotalPay = $Pay * $numDays;
    
        return view('./cart', compact('cartItems', 'checkIn', 'checkOut', 'numPeople','numDays','TotalPay'));
    }
    

    public function addToCart(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            ),
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart.list');
    }

    public function clearAllCart(){
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request){
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request){
        \Cart::update(
            $request->id,
            ['quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ]]
        );
        session()->flash('success', 'Item Cart is update Successfully !');
        return redirect()->route('cart.list');
    }
}
