<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\booking_room_detail;
use App\Models\booking_service_detail;
use App\Models\room_type;
use Illuminate\Support\Facades\Session;
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
    
        return view('./payment', compact('roomTypes','services', 'checkIn', 'checkOut', 'numPeople','numDays','TotalPay','Room_Quantity','Service_Quantity'));
    }
    public function Add(Request $request){
        $cartItems = \Cart::getContent();
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
        $roomTypes = $cartItems->filter(function ($item) {
            return isset($item->attributes['type']) && $item->attributes['type'] === 'room_type';
        });
        $Pay = $roomTypes->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $roomPay = $Pay * $numDays;
        $services = $cartItems->filter(function ($item) {
            return isset($item->attributes['type']) && $item->attributes['type'] === 'service';
        });
        $Pay2 = $services->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        foreach ($roomTypes as $item) {
            $roomId = $item->id;
            $numberPartr = substr($roomId, strlen('room_type_'));
            $roomType = room_type::findOrFail($numberPartr);
            $roomIds = room::where('room_type_id', $roomType->id)->pluck('id')->toArray();
            $numberOfRooms = count($roomIds);
            if ($item->quantity > $numberOfRooms) {
                return redirect()->back()->with('error', 'Số lượng phòng không đủ. Vui lòng lựa chọn lại.');
            }

        }
        $TotalPay = $roomPay + $Pay2;
        $orders->name = $request->name;
        $orders->email = $request->email;
        $orders->SoDienThoai = $request->phone;
        $orders->Date_check_in = $checkIn;
        $orders->Date_check_out = $checkOut;
        $orders->TotalBill = $TotalPay;
        $orders->SoNguoi = $numDays;
        $orders->save();
        foreach ($roomTypes as $item) {
            $roomId = $item->id;
            $numberPartr = substr($roomId, strlen('room_type_'));
            $roomType = room_type::findOrFail($numberPartr);
            $roomIds = room::where('room_type_id', $roomType->id)->pluck('id')->toArray();
            for ($i = 0; $i < $item->quantity; $i++) {
                $selectedRoomId = array_shift($roomIds);
                $orderDetail = new booking_room_detail;
                $orderDetail->booking_id = $orders->id;
                $orderDetail->room_id = $selectedRoomId;
                $orderDetail->SoLuong = 1;
                $orderDetail->TongSoTien= $item->price*$numDays;
                $orderDetail->save();
            }
        }
        foreach ($services as $item) {
            $orderDetailS = new booking_service_detail;
            $serviceId = $item->id;
            $numberPart = substr($serviceId, strlen('service_'));
            $orderDetailS->booking_id = $orders->id; 
            $orderDetailS->service_id = $numberPart; 
            $orderDetailS->SoLuong = $item->quantity; 
            $orderDetailS->TongSoTien = $item->price * $item->quantity;
            $orderDetailS->save();
        }


    \Cart::clear();
    Session::forget('check_in_out');


        return redirect()->route('user.home_page');
        
    }
    
}
