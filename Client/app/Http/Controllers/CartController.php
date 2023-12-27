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
        

        $roomTypes = $cartItems->filter(function ($item) {
            return isset($item->attributes['type']) && $item->attributes['type'] === 'room_type';
        });
        $Pay = $roomTypes->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $Room_Quantity = $roomTypes->sum(function ($item) {
            return $item->quantity;
        });
        $roomPay = $Pay * $numDays;
    
        $services = $cartItems->filter(function ($item) {
            return isset($item->attributes['type']) && $item->attributes['type'] === 'service';
        });
        $Pay2 = $services->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $Service_Quantity = $services->sum(function ($item) {
            return $item->quantity;
        });

        $TotalPay = $roomPay + $Pay2;
    
        return view('./cart', compact('roomTypes','services', 'checkIn', 'checkOut', 'numPeople','numDays','TotalPay','Room_Quantity','Service_Quantity'));
    }
    

    public function addToCart(Request $request){
        \Cart::add([
            'id' => 'room_type_' . $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'type' => 'room_type',
            ),
        ]);
        session(['room_type' => 'room_type_' . $request->id]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart.list');
    }

    public function addServiceToCart(Request $request){
        \Cart::add([
            'id' => 'service_' . $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'type' => 'service',
            ),
        ]);
        session(['service' => 'service_' . $request->id]);
        session()->flash('success', 'Service is Added to Cart Successfully !');
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
