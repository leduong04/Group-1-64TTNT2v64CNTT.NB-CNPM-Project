@extends('templates.tpl_default', ['pageId'=>'dashboard'])
@section('css')
    <link rel="stylesheet"  href="{{ asset('assets/css/dashboard.css') }}">  
    <link rel="stylesheet"  href="{{ asset('assets/css/sidebar.css') }}">  
    <link rel="stylesheet"  href="{{ asset('assets/css/add_service.css') }}">  

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
            <span class="text">Quản lý loại phòng</span>
        </div>
        <div class="data-table">
            <div class="container">
                <div class="title">Sửa thông tin loại phòng</div>
                <div class="content">
                    <form action="#">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Tên loại phòng</span>
                                <input type="text" placeholder="Tên dịch vụ" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Số lượng phòng</span>
                                <input type="text" placeholder="Giá dịch vụ" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Thông tin phòng</span>
                                <input type="text" placeholder="Tình trạng" required>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Cập nhật">
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </section>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
@endsection