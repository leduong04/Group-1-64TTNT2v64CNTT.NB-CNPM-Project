@extends('templates.tpl_default', ['pageId'=>'dashboard'])
@section('css')
    <link rel="stylesheet"  href="{{ asset('assets/css/dashboard.css') }}">  
    <link rel="stylesheet"  href="{{ asset('assets/css/sidebar.css') }}">  
    <link rel="stylesheet"  href="{{ asset('assets/css/add.css') }}">  

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<section class="home-section">
  <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Quản lý nhân viên</span>
    </div>
    <div class="container">
        <form>
            <div class="title">Thêm nhân viên mới</div>
            <div class="pre-ava">
                <div class="text-center">
                    <div class="img-ava">
                        <img id="previewImage" src="#" alt="Preview" class="avatar">
                    </div>
                </div>
                <div class="mx-2">
                    <h4 class="mb-1">Chọn ảnh đại diện</h4>
                    <input type="file" id="fileInput" onchange="displayImage()">
                </div>
            </div>
            <hr class="my-4" />
            <div class="form row">
                <div class="input-box col-md-6">
                    <span class="details">Họ và tên</span>
                    <input type="text" placeholder="Họ và tên" required>
                </div>
                <div class="input-box col-md-6">
                    <span class="details">Ngày sinh</span>
                    <input type="date" placeholder="Ngày sinh" required>
                </div>
            </div>
            <div class="form row">
                <div class="input-box col-md-6">
                    <span class="details">Giới tính</span>
                    <select>
                        <option selected="">Chọn giới tính</option>
                        <option>Nam</option>
                        <option>Nữ</option>
                    </select>
                </div>
                <div class="input-box col-md-6">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Email" required>
                </div>

            </div>
            <div class="form row">
                <div class="input-box col-md-6">
                    <span class="details">Số điện thoại</span>
                    <input type="text" placeholder="Số điện thoại" required>
                </div>
                <div class="input-box col-md-6">
                    <span class="details">Chức vụ</span>
                    <input type="text" placeholder="Chức vụ" required>
                </div>
            </div>
            <hr class="my-4" />
            <div class="form row mb-4">
                <div class="col-md-6">
                    <div class="input-box">
                        <span class="details">Mật khẩu</span>
                        <input type="password" placeholder="Mật khẩu" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Nhập lại mật khẩu</span>
                        <input type="password" placeholder="Nhập lại mật khẩu" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="mb-2">Yêu cầu về mật khẩu</p>
                    <p class="small text-muted mb-2">Để tạo mật khẩu mới, bạn phải đáp ứng tất cả các yêu cầu sau:</p>
                    <ul class="small text-muted pl-4 mb-0">
                        <li>Tối thiểu 8 ký tự</li>
                        <li>Ít nhất một ký tự đặc biệt</li>
                        <li>Ít nhất một số</li>
                        <li>Không được giống mật khẩu trước đó</li>
                    </ul>
                </div>
            </div>
            <button type="submit" class="btn">Thêm mới</button>
        </form>
    </div>
</section>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
@endsection