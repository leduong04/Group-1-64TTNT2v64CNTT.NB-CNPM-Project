<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\booking_room_detail;
use App\Models\room_type;
use App\Models\room;

class PaymentController extends Controller
{
    public function Payment(){
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
    
        return view('./payment', compact('cartItems', 'checkIn', 'checkOut', 'numPeople','numDays','TotalPay'));
    }
    public function Add(Request $request){
        $orders = new booking;
        $checkInOut = session('check_in_out');
        $numPeople = session('num_people');
    
        $dateRange = explode(' - ', $checkInOut);
        
        if (count($dateRange) == 2) {
            $checkInDate = \Carbon\Carbon::parse($dateRange[0]);
        $checkOutDate = \Carbon\Carbon::parse($dateRange[1]);

        $checkIn = $checkInDate;
        $checkOut = $checkOutDate;
        $numDays = $checkInDate->diffInDays($checkOutDate);
        } else {
            $checkIn = $checkOut = 'Ngày không hợp lệ';
        }
        $Pay = \Cart::getTotal();
        $TotalPay = $Pay * $numDays;
        $orders->name = $request->name;
        $orders->email = $request->email;
        $orders->SoDienThoai = $request->phone;
        $orders->Date_check_in = $checkIn;
        $orders->Date_check_out = $checkOut;
        $orders->TotalBill = $TotalPay;
        $orders->SoNguoi = $numDays;
        $orders->save();

        $cartItems = \Cart::getContent();
        foreach ($cartItems as $item) {
            $roomType = room_type::findOrFail($item->id);
            $roomIds = room::where('room_type_id', $roomType->id)->pluck('id')->toArray();
            for ($i = 0; $i < $item->quantity; $i++) {
                $selectedRoomId = reset($roomIds);
                $orderDetail = new booking_room_detail;
                $orderDetail->booking_id = $orders->id;
                $orderDetail->room_id = $selectedRoomId;
                $orderDetail->SoLuong = 1;
                $orderDetail->TongSoTien= $item->price;
                $orderDetail->save();
            }
    }

    \Cart::clear();


        return redirect()->route('user.home_page');
        
    }
    
}
