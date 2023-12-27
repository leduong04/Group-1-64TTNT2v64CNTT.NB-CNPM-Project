<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- Box-icon -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/payment.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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


  <section class="payment">
    <div class="payment_name">Thanh toán</div>
    <div class="payment_main">
      <div class="pay_prd">
        <h3 style="margin-top:10px">Chi Tiết Đặt Phòng</h3>
        <h4>Phòng</h4>
        @foreach($roomTypes as $Items)
        <div class="product">
          <a href=""><img src="{{$Items -> attributes->image}}" alt=""></a>
          <div class="content">
            <span class="name">{{$Items->name}}</span>
            <br>
            <span class="quantity">Số lượng : <span class="qtt">{{ $Items->quantity}}</span></span>
          </div>
        </div>
        @endforeach
        <h4>Dịch Vụ</h4>
        @foreach($services as $Items)
        <div class="product">
          <a href=""><img src="{{$Items -> attributes->image}}" alt=""></a>
          <div class="content">
            <span class="name">{{$Items->name}}</span>
            <br>
            <span class="quantity">Số lượng : <span class="qtt">{{ $Items->quantity}}</span></span>
          </div>
        </div>
        @endforeach
      </div>
      <div class="pay_form">
        <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data" >
            @csrf
          <div class="left">
            <h3>BILLING ADDRESS</h3>
            <span><i class="fa-solid fa-signature"></i> Full name</span>
            <input type="text" name="name" placeholder="Enter name" required>
    
            <span><i class="fa-solid fa-envelope"></i> Email</span>
            <input type="text" name="email" placeholder="Enter email" required>
                
            <span><i class="fa-solid fa-mobile-screen-button"></i> Phone</span>
            <input type="text" name="phone" placeholder="Enter your phone" required>
          </div>
          <div class="right">
            <h3>Hóa Đơn</h3>
            <div class="prd_order"><span><i class="fa-solid fa-basket-shopping"></i> Số Lượng Phòng : </span><span class="chan">{{$Room_Quantity}}</span></div>
            <div class="prd_order"><span><i class="fa-solid fa-basket-shopping"></i> Số Lượng Dịch Vụ : </span><span class="chan">{{$Service_Quantity}}</span></div>
            <div class="prd_order"><span><i class="fa-solid fa-calendar-days"></i> Ngày nhận phòng : </span><span class="chan">{{ $checkIn }}</span></div>
            <div class="prd_order"><span><i class="fa-solid fa-calendar-days"></i> Ngày trả phòng : </span><span class="chan">{{ $checkOut }}</span></div>
            <div class="prd_order"><span><i class="fa-solid fa-moon"></i> Số Đêm : </span><span class="chan">{{$numDays}}</span></div>
            <div class="price_order"><i class="fa-solid fa-money-check-dollar"></i><span> Tổng Tiền : </span><span class="chan"> {{number_format($TotalPay, 0, ',', '.')}} đ</span></div>
            <button type="submit">Xác Nhận</button>
            <a class="back"href="{{ route('cart.list') }}">Quay Lại</a>
          </div>
        </form>
      </div>
    </div>
  </section>


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

  @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif 

    <script src="{{asset('assets/js/payment.js')}}"></script>
</body>
</html>