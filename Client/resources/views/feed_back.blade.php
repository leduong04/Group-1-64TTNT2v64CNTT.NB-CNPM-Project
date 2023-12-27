<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{asset('assets/css/feed_back.css')}}">
    <style>
    #stay_here {
        background-color: #fff;
    }

    #stay_here a {
        color: #005745 !important;
    }
</style>
</head>
<body>
    <header id="header_bar">
        <div class="nav_bar">
            <div class="head_content">
                <div class="head_logo">
                    <a href="/"><img src="./../../../image/loggo.png" alt=""></a>
                </div>
                <div class="head_link">
                    <ul class="menu_item" style="margin-right: 150px;">
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
    <div class="container" id="form">
    <div class="contact_form row " id="contact_form">
        <div class="form col-md-7  ">
            <h2>Contact us</h2>
            <form action="{{ route('user.addfeed_back') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row ">
                <div class="col-md-6 ">
                    <div id="label" for="">Full Name</div>
                    <input type="text" placeholder="Full name" name="name" required>
                </div>
                <div class="col-md-6 ">
                    <div id="label" for="">Email</div>
                    <input type="text" placeholder="Email" name="email" required>
                </div>

                <div class="col-md-12 ">
                    <div id="label" for="">Message</div>
                    <textarea placeholder="Message" name="noidung" id="" required></textarea>
                </div>
                <div class="submit">
                    <button type="submit">Send Message</button>
                </div>

            </div>
            </form>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.661206405767!2d105.8237424760264!3d21.006213588551056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad744eb9a567%3A0x86ebcd89ee0bda7b!2zMTc1IFAuIFTDonkgU8ahbiwgVHJ1bmcgTGnhu4d0LCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1685617048543!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="col-md-5 px-0"></iframe>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4 style="margin-left:32px">company</h4>
                <ul>
                    <li><a href="/">trang chủ</a></li>
                    <li><a href="{{route('user.room')}}">phòng</a></li>
                    <li><a href="{{route('user.service')}}">dịch vụ</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 style="margin-left:32px">get help</h4>
                <ul>
                    <li><a href="{{route('user.feed_back')}}">Feed Back</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 style="margin-left:32px">CONTACT</h4>
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
</body>
</html>




