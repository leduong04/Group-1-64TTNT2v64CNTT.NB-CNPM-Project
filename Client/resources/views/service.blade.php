<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/room.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <a href="{{ route('cart.list') }}"><div>Booking</div></a>
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
        <div class="main_product">
            <div class="product-container">
                <div class="product_name">
                    <p class="product_name_main">Dịch Vụ</p>
                    <p class="product_name_link"><a href="/">HOME</a> / Dịch Vụ</p>
                </div>
                <div id="product_cart" class="product_cart">
                    @foreach($services as $service)
                    <div class="cart">
                        <!-- Có thẻ a -->
                        <a href="{{route('user.service_detail',['id'=>$service->id])}}"><p class="name_cart">{{$service->name}}</p></a>
                        <div class="cart_main">
                            <div class="cart_left">
                                <div class="cart_left_img">
                                    <a href="{{route('user.service_detail',['id'=>$service->id])}}">
                                        @if ($service->img_link)
                                            <img src="./../../../image/{{$service->img_link}}" alt="">
                                        @else
                                            <img src="default_image_url_here" alt="No Image">
                                        @endif
                                    </a>
                                </div>
                                <div class="cart_left_title">
                                    <p class="cart_left_title_mt">Tiêu Chuẩn</p>
                                    <div class="cart_left_title_tc">
                                        <p><i class="fa-solid fa-person"></i> x 1</p>
                                        <p><i class="fa-solid fa-receipt"></i> Thanh toán 100% giá trị dịch vụ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cart_right">
                                <form action="{{route('cart.addService')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <p class="cart_right_prize"><span>{{ number_format($service->price, 0, ',', '.') }}</span> đ (1 lần)</p>
                                    <div class="cart_right_btt" style="margin-top: 20px;">
                                        <input type="hidden" value="{{$service->id}}" name="id">
                                        <input type="hidden" value="{{$service->name}}" name="name">
                                        <input type="hidden" value="{{$service->price}}" name="price">
                                        <input type="hidden" value=" ./../../../image/{{$service->img_link}}" name="image">
                                        <input type="hidden" id="hiddenQuantity" value="1" name="quantity">
                                        <button style="cursor: pointer;" onclick="return validateSession()" >Đặt Ngay</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="other_button">
                        <button id="seeMoreBtn" onclick="seeMore()"><p>See more</p><i class="fa-solid fa-angles-down"></i></button>
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
   <script src="{{asset('assets/js/room.js')}}"></script>
</body>
</html>