<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/trang_chu.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
    <header id="header_bar">
        <div class="nav_bar">
            <div class="head_content">
                <div class="head_logo">
                    <a href="/"><img src="./../../../image/loggo.png" alt=""></a>
                </div>
                <div class="head_link">
                    <ul class="menu_item">
                        <li class="menu_child">
                            <a href="/"><div>Trang chủ</div></a>
                        </li>
                        <li class="menu_child">
                            <a href="{{route('user.room')}}"><div>Phòng</div></a>
                        </li>
                        <li class="menu_child">
                            <a href="{{route('user.service')}}"><div>Dịch Vụ</div></a>
                        </li>
                        <li class="menu_child">
                            <a href="{{ route('cart.list') }}"><div>Giỏ Hàng</div></a>
                            {{ Cart::getTotalQuantity()}}
                        </li>   
                    </ul>
                </div>
                <div class="head_log">
                    <div class="book_room">
                        <a href="{{route('user.room')}}">Đặt ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="main_content">
            <div class="image-container" style="background-image: url('https://lotusaromasapa.com/files/images/banner/bn2.jpg');">
                <div class="overlay"></div>
                <div class="image-text" id="image-text">CHÀO MỪNG ĐẾN VỚI AVIP HOTEL LUXURY</div>
            </div>
            <div class="main-container">
                <div class="search">
                    <div class="search_content">
                        <form action="{{route('search')}}" method="get">
                            <input type="text" class="input_search" name="datefilter" value="{{ session('check_in_out') }}" placeholder="Check-in > Check-out" required/>
                            <input id="num" type="number" class="num_select" name="num_people" value="{{ session('num_people',1) }}" placeholder="Số lượng người" required>
                            <button class="search_btt" type="submit">Xác Nhận</button>
                        </form>
                    </div>
                    <div class="overview">
                        <div class="ovv_content">
                            <div class="ovv_left">
                                <h2>OVERVIEW VỀ AVIP HOTEL LUXURY</h2>
                                <p>
                                    Tọa lạc tại trung tâm thị trấn Sapa, cách nhà thờ Holy Rosary 800m, 
                                    khách sạn AVIP LUXURY là nơi lưu trú hoàn hảo cung cấp mọi tiện nghi
                                    mà du khách cần cho một kỳ nghỉ thư giãn và đáng nhớ nhất.
                                </p>
                                <p>
                                    70 phòng và suite tại khách sạn AVIP LUXURY được thiết kế và trang bị 
                                    trang nhã, tạo nên một không gian hài hòa giữa nét sang trọng quý 
                                    phái và phong cách tân cổ điển. Thiết kế nội thất, trang thiết bị 
                                    tiện nghi hiện đại, đồng nhất tạo nên một không gian sống tiện nghi, 
                                    đẳng cấp nhưng ấm cúng, giống như một tổ ấm mà mọi vị khách đều mong
                                    muốn quay trở lại.
                                </p>
                                <p>
                                    Một điều khiến khách sạn AVIP LUXURY nổi bật là dịch vụ đặc biệt với
                                    nhiều tiện ích đa dạng như nhà hàng, sky Lounge, spa, phòng họp, 
                                    trung tâm thể dục, câu lạc bộ trẻ em, thư viện, trung tâm thương mại,
                                    cho thuê xe. Vượt trên sự mong đợi của du khách về một nơi lưu trú, 
                                    khách sạn AVIP LUXURY biến trải nghiệm của bạn thành niềm đam mê đích thực.
                                </p>
                            </div>
                            <div class="ovv_right">
                                <img src="https://lotusaromasapa.com/files/images/ab.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="choose_title">
                        <div class="choose_content">
                            <div class="choose_name">
                                <p class="why">TẠI SAO NÊN CHỌN AVIP HOTEL LUXURY</p>
                                <h1>Những Lợi Ích</h1>
                            </div>
                            <div class="choose_menu">
                                <div class="choose_hang">
                                    <div class="choose_child">
                                        <i class="fa-regular fa-credit-card"></i>
                                        <p class="choose_child_name">Đảm Bảo Giá Tốt Nhất</p>
                                        <p class="choose_child_nd">Đảm bảo giá của AVIP HOTEL luôn được cập nhật tốt nhất so với thị trường</p>
                                    </div>
                                    <div class="choose_child">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <p class="choose_child_name">Luôn Đảm bảo còn chỗ</p>
                                        <p class="choose_child_nd">Luôn cập nhật những phòng tốt nhất cho các bạn</p>
                                    </div>
                                    <div class="choose_child">
                                        <i class="fa-regular fa-clock"></i>
                                        <p class="choose_child_name">Trả phòng trễ theo yêu cầu</p>
                                        <p class="choose_child_nd">Chúng tôi sẵn sàng để phục vụ mọi yêu cầu trả phòng của khách hàng</p>
                                    </div>
                                </div>
                                <div class="choose_hang">
                                    <div class="choose_child">
                                        <i class="fa-solid fa-wifi"></i>
                                        <p class="choose_child_name">Wi-Fi miễn phí có sẵn</p>
                                        <p class="choose_child_nd">AVIP HOTEL LUXURY luôn cung cấp Wifi cho tất cả khách hàng. Với tốc độ truy cập cao không lo giật lag trong mọi lúc</p>
                                    </div>
                                    <div class="choose_child">
                                        <i class="fa-solid fa-utensils"></i>
                                        <p class="choose_child_name">Gặp gỡ và Sự kiện đặc biệt</p>
                                        <p class="choose_child_nd">Chúng tôi sẽ luôn có các sự kiện đặc biệt với những món ăn ngon để phục vụ bạn bất cứ lúc nào</p>
                                    </div>
                                    <div class="choose_child">
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                        <p class="choose_child_name">Hủy bất cứ lúc nào</p>
                                        <p class="choose_child_nd">Dễ dàng hủy đặt phòng mọi lúc mọi nơi đa phương tiện</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="room_suit_1">
                        <div class="room">
                            <div class="room_name">
                                <p>NIỀM VUI CỦA SỰ QUÝ TỘC</p>
                                <h1>Phòng & Căn hộ</h1>
                            </div>
                            <div class="slider-container">
                                <div class="arrow arrow-left"><i class="fa-solid fa-chevron-left"></i></div>
                                <div class="arrow arrow-right"><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="slider">
                                    @foreach($room_types as $room_type)
                                    <div class="slide">
                                        <div class="slide_img">
                                            @if ($room_type->images->count() > 0)
                                            <img src="./../../../{{ $room_type->images->first()->img_link }}" alt="">
                                            @else
                                            <img src="default_image_url_here" alt="No Image">
                                            @endif
                                        </div>
                                        <div class="slide_content">
                                            <p class="slide_name">{{ $room_type->name}}</p>
                                            <p class="slide_prize">{{ number_format($room_type->price, 0, ',', '.') }}đ/đêm <span><i class="fa-solid fa-person"></i> x 4</span></p>
                                            <p class="slide_nd">
                                                {{ $room_type-> ThongTinPhong}}
                                            </p>
                                            <div class="slide_link">                                   
                                                <a href="{{route('user.room_detail',['id'=>$room_type->id])}}">Chi tiết</a>
                                                <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{$room_type->id}}" name="id">
                                                    <input type="hidden" value="{{$room_type->name}}" name="name">
                                                    <input type="hidden" value="{{$room_type->price}}" name="price">
                                                    <input type="hidden" value=" ./../../../{{ $room_type->images->first()->img_link }}" name="image">
                                                    <input type="hidden" id="hiddenQuantity" value="1" name="quantity">
                                                    <button style="cursor: pointer;" onclick="return validateSession()">Đặt Ngay</button>
                                                </form>
                                            </div>
                                            <div class="slide_tt_sl">
                                                <span>Còn {{ $room_type->availableRoomsCount }} phòng trống</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                              
                                <div class="pagination"></div>
                            </div>
                        </div>
                    </div>
                    <div class="room_suit">
                        <div class="room">
                            <div class="room_name">
                                <p>TẬN HƯỞNG NHỮNG TRẢI NGHIỆM CỦA BẠN</p>
                                <h1>Dịch Vụ</h1>
                            </div>
                            <div class="slider-container">
                                <div class="arrow arrow-left"><i class="fa-solid fa-chevron-left"></i></div>
                                <div class="arrow arrow-right"><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="slider">
                                    @foreach($services as $service)
                                    <div class="slide">
                                        <div class="slide_img">
                                            @if ($service->img_link)
                                            <img src="./../../../image/{{$service->img_link}}" alt="">
                                            @else
                                            <img src="default_image_url_here" alt="No Image">
                                            @endif
                                        </div>
                                        <div class="slide_content">
                                            <p class="slide_name">{{$service->name}}</p>
                                            <p class="slide_prize">{{ number_format($service->price, 0, ',', '.') }}đ/lần</p>
                                            <p class="slide_nd">
                                                {{$service->MoTa}}
                                            </p>
                                            <div class="slide_link">                                   
                                                <a href="{{route('user.service_detail',['id'=>$service->id])}}">Chi tiết</a>
                                                <a href="">Đặt ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                              
                                <div class="pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="/">trang chủ</a></li>
                        <li><a href="{{route('user.room')}}">phòng</a></li>
                        <li><a href="{{route('user.service')}}">dịch vụ</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="{{route('user.feed_back')}}">Feed Back</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>CONTACT</h4>
                    <ul>
                        <li class="inf">Address:  <span>Hà Nội, ĐHTL</span></li>
                        <li class="inf">Phone:  <span>+84 9999 99 99 99</span></li>
                        <li class="inf">Email: <a href="mailto:trungthanhcva2206@gmail.com"> trungthanhcva2206@gmail.com</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>AVIP HOTEL LUXURY</h4>
                    <ul>
                        <li class="tt">Khách sạn cực khoái</li>
                    </ul>
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/truongxuannam"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/txnam"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/truongxuannam"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
   </footer>

   <script type="text/javascript">
    $(function() {
    
      $('input[name="datefilter"]').daterangepicker({
          autoUpdateInput: false,
          locale: {
              cancelLabel: 'Clear'
          }
      });
    
      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      });
    
      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });
    
    });

    var checkInOut = "{{ session('check_in_out') }}";
    var numPeople = "{{ session('num_people', 1) }}";

    function validateSession() {
        if (!checkInOut || !numPeople) {
            alert("Vui lòng nhập thông tin Check-in/Check-out và Số lượng người trước khi xác nhận.");
            return false; 
        }

        return true;
    }
    </script>
   <script src="{{ asset('assets/js/trang_chu.js')}}"></script>
</body>
</html>











