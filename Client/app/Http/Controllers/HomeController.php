<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\feed_back;
use Illuminate\Http\Request;
use App\Models\room_type;
use App\Models\service;

class HomeController extends Controller
{
    public function show_home_page(){
        $room_types = room_type::all();
        $checkInOut = session('check_in_out');
        
        $dateRange = explode(' - ', $checkInOut);
            
        if (count($dateRange) == 2) {
            $checkInDate = \Carbon\Carbon::parse($dateRange[0]);
            $checkOutDate = \Carbon\Carbon::parse($dateRange[1]);
    
            $checkIn = $checkInDate->format('Y/m/d');
            $checkOut = $checkOutDate->format('Y/m/d');
            $numDays = $checkInDate->diffInDays($checkOutDate);
        } else {
            $checkIn = $checkOut = 'Ngày không hợp lệ';
        }
        $availableRooms = $this->checkAvailableRooms($checkIn,$checkOut);
        foreach ($room_types as $room_type) {
            $room_type->availableRoomsCount = $availableRooms[$room_type->id];
        }    
        $services = service::all(); 
        return view('./trang_chu',compact('room_types','services'));
    }
    public function show_room_detail($id){
        $other_room_details = room_type::where('id','!=',$id)->get();
        $room_details = room_type::findOrFail($id);
        return view('./room_detail',compact('room_details','other_room_details'));
    }
    public function show_service_detail($id){
        $other_service_details = service::where('id','!=',$id)->get();
        $service_details = service::findOrFail($id);
        return view('./service_detail',compact('other_service_details','service_details'));
    }
    public function show_room(){
        $rooms = room_type::all();
    
        return view('./room', compact('rooms'));
    }
    
    public function show_service(){
        $services = service::all();
        return view('./service',compact('services'));
    }
    public function show_feedBack(){
        return view('./feed_back');
    }
    public function add_feedBack(Request $request){
        $feedback = new feed_back;
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->NoiDungFeed = $request->noidung;
        $feedback->save();
        return redirect()->route('user.feed_back');
    }
    public function search(Request $request)
{
    session(['check_in_out' => $request->input('datefilter')]);
    session(['num_people' => $request->input('num_people')]);

    return redirect()->route('cart.list');

}
public function checkAvailableRooms($checkIn, $checkOut) {
    $roomTypes = room_type::all();

    $availableRoomsCount = [];

    foreach ($roomTypes as $roomType) {
        $bookedRooms = DB::table('booking_room_detail')
            ->join('booking', 'booking_room_detail.booking_id', '=', 'booking.id')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('booking.Date_check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('booking.Date_check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('booking.Date_check_in', '>=', $checkIn)
                            ->where('booking.Date_check_out', '<=', $checkOut);
                    });
            })
            ->pluck('room_id')
            ->toArray();
        $totalRooms = $roomType->SoLuongPhong;
        $bookedRoomsCount = count(array_unique($bookedRooms));
        $availableRooms = max(0, $totalRooms - $bookedRoomsCount);

        $availableRoomsCount[$roomType->id] = $availableRooms;
    }

    return $availableRoomsCount;
}

}
