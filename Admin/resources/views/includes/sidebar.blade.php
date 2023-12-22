<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body style="background: #E4E9F7;">
  <div class="sidebar close">
    <div class="logo-details">
      <img src="../assets/img/loggo.png" alt="">
      <span class="logo_name">AVIP</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="{{ route('admin/dashboard') }}">
          <i class='bx bx-grid-alt'></i>
          <span class="link_name">Trang chủ</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Trang chủ</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('admin/employee') }}">
          <i class="fa-regular fa-user"></i>
          <span class="link_name">Nhân viên</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Nhân viên</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('admin/room_type') }}">
            <i class="fa-solid fa-hotel"></i>
            <span class="link_name">Phòng</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Phòng</a></li>
          <li><a href="#">Lớn</a></li>
          <li><a href="#">Nhỏ</a></li>
          <li><a href="#">Vip</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('admin/service') }}">
          <i class="fa-solid fa-bell-concierge"></i>
          <span class="link_name">Dịch vụ</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dịch vụ</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('admin/booking') }}">
          <i class="fa-solid fa-check"></i>
          <span class="link_name">Đặt phòng</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Đặt phòng</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('admin/feedback') }}">
            <i class="fa-regular fa-comment"></i>
            <span class="link_name">Phản hồi</span>
          </a>
        </div>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="link_name">Cài đặt</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Cài đặt</a></li>
        </ul>
      </li>
      <li>
      <div class="profile-details">
    <div class="profile-content">
        <img src="{{ Auth::user()->AnhDaiDien }}" alt="profileImg">
    </div>
    <div class="name-job">
        <div class="profile_name">
            {{ Auth::user()->name }}
        </div>
        <div class="job">
            {{ Auth::user()->role }}
        </div>
    </div>
    <a href="{{ route('admin/logout') }}"><i class='bx bx-log-out'></i></a>
</div>
      </li>
    </ul>
  </div>
</body>
</html>