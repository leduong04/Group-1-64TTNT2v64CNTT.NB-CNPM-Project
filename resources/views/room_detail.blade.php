<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/detail.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <a href=""><div>Giỏ Hàng</div></a>
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
            <div class="image-container">
                <div class="overlay">
                    <img class="mySlides" src="./../../../{{ $room_details->images->first()->img_link }}" alt="">
                </div>
                <div class="image-title" id="image-title">
                    <div class="img_name">
                        <p class="name_img">{{$room_details->name}}</p>
                        <p class="title_img"><a href="/">HOME</a> / <a href="{{route('user.room')}}">ROOM</a> / {{$room_details->name}}</p>
                    </div>
                    <div class="img_prize">
                        <p><span>{{ number_format($room_details->price, 0, ',', '.') }}</span> đ/đêm</p>
                    </div>
                </div>
            </div>
            <div class="main-container">
                <div class="image-container-main">
                    <div class="image_main">
                        <div class="image-left">
                            <img id="main-image" src="" alt="Main Image">
                            <div class="thumbnail-container" id="thumbnail-container">
                                @foreach($room_details->images as $image)
                                    <img class="thumbnail" src="./../../../{{ $image->img_link }}" alt="Thumbnail 1">
                                @endforeach
                            </div>
                        </div>
                        <div class="image-right">
                            <div class="image-right_tt">
                                <span>Con 2 phong chong</span>
                            </div>
                            <p class="image-right-name">
                                {{$room_details->name}}
                            </p>
                            <p class="image-right-mt">
                                {{$room_details->ThongTinPhong}}
                            </p>
                            <p class="image_icon"><i class="fa-solid fa-person"></i> x 4</p>
                            <p class="image-right-prize">{{ number_format($room_details->price, 0, ',', '.') }}đ/đêm</p>
                            <div class="image-right-btt">
                                <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$room_details->id}}" name="id">
                                    <input type="hidden" value="{{$room_details->name}}" name="name">
                                    <input type="hidden" value="{{$room_details->price}}" name="price">
                                    <input type="hidden" value=" ./../../../{{ $room_details->images->first()->img_link }}" name="image">
                                    <input type="hidden" id="hiddenQuantity" value="1" name="quantity">
                                    <button style="cursor: pointer;" onclick="return validateSession()">Đặt Ngay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="other_room">
                    <div class="other_room_main">
                        <p class="other_name">Các Phòng Khác</p>
                        <div class="other" id="myContainer">
                            @foreach($other_room_details as $other_room_detail)
                            <div class="other_img">
                                <a href="{{route('user.room_detail',['id'=>$other_room_detail->id])}}">
                                    <img src="./../../../{{ $other_room_detail->images->first()->img_link }}" alt="">
                                    <p class="other_title">{{$other_room_detail->name}}</p>
                                    <p class="other_prize">{{ number_format($other_room_detail->price, 0, ',', '.') }}đ/đêm</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="other_button">
                            <button id="seeMoreBtn" onclick="seeMore()"><p>See more</p><i class="fa-solid fa-angles-down"></i></button>
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
   <script src="{{asset('assets/js/detail.js')}}"></script>
</body>
</html>











