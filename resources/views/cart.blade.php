<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Responsive Shopping Cart design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="{{asset('assets/css/cart.css')}}">
 
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
                        <a href="/"><div>Trang Chủ</div></a>
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
    <div class="wrapper">
		<h1><span>Đặt phòng</span></h1>
		<div class="project">
			<div class="shop">
            @foreach($cartItems as $Items)
				<div class="left-bar">
                        
                            <div class="box">
                    <img src="{{$Items -> attributes->image}}">
                    <div class="content">
                    <h3>{{$Items->name}}</h3>
                    <h4>{{ number_format($Items->price, 0, ',', '.') }} đ</h4>
                        <div class="lb">
                        <form action="{{ route('cart.update')}}" method="post" >
                            @csrf
                            <input type="hidden" name="id" value="{{ $Items->id}}">
                            <p class="unit" style="display: inline-block; font-size:18px">Số lượng:
                            <input type="number" name="quantity" value="{{ $Items->quantity}}">
                            </p>
                            <button class="update-button" type="submit">Cập nhật</button>
                        </form>
                    <form action="{{ route('cart.remove')}}" method="post" style="width: auto;">
                        @csrf
                        <input type="hidden" value="{{$Items -> id}}" name="id">
                        <button class="cancel-button" type="submit">Hủy</button>
                    </form>
                </div>
                    </div>
                    <div class="booking">
                        <strong>
                            <p>Ngày nhận: <span>{{ $checkIn }}</span><br></p>
                        </strong>
                        <strong>
                            <p>Ngày trả:  <span>{{ $checkOut }}</span><br></p>
                        </strong>
                    </div>


                </div>
                        </div>
                @endforeach
			</div>
			<div class="right-bar">
				<div class="pay">
					<p><span>Số phòng đã đặt:</span> <span>{{Cart::getTotalQuantity()}}</span></p>
                    <p><span>Số lượng đêm:</span> <span>{{$numDays}}</span></p>
                    <p><span>Số lượng người:</span> <span>{{ $numPeople }}</span></p>
					<hr>
					<p class="rb"><span>Thành tiền</span> <span>{{number_format($TotalPay, 0, ',', '.')}} đ</span></p><a href="{{ route('payment') }}"><i class="fa fa-shopping-cart"></i>Thanh Toán</a>
				</div>
			</div>
		</div>
	</div>
  <footer class="footer" style="margin-top: 50px;">
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
<script src="{{asset('assets/js/cart.js')}}">
</script>
</body>
</html>