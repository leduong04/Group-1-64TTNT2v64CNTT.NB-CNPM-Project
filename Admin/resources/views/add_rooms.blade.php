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
      <span class="text">Quản lý Phòng</span>
    </div>
    <div class="container">
      <form>
        <div class="title mt-4">Thêm phòng mới</div>
        <div class="form row">
          <div class="input-box col-md-6">
            <span class="details">Tên phòng</span>
            <input type="text" placeholder="Tên phòng" required>
          </div>
          <div class="input-box col-md-6">
            <span class="details">Loại phòng</span>
            <input type="text" value="Lớn" disabled>
          </div>
        </div>
        <div class="form row">
          <div class="input-box col-md-6">
            <span class="details">Số lượng người tối đa</span>
            <input type="text" placeholder="Số lượng người tối đa" required>
          </div>
          <div class="input-box col-md-6">
            <span class="details">Giá phòng</span>
            <input type="text" placeholder="Giá phòng" required>
          </div>
        </div>
        <hr class="my-4" />
        <div class="title mt-4 mb-4">Ảnh minh hoạ</div>
        <div class="form row mb-4">
          <div class="col-md-6">
            <div class="input-box">
              <span class="details">Ảnh 1</span>
              <input type="file" required>
            </div>
            <div class="input-box">
              <span class="details">Ảnh 2</span>
              <input type="file" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-box">
              <span class="details">Ảnh 3</span>
              <input type="file" required>
            </div>
            <div class="input-box">
              <span class="details">Ảnh 4</span>
              <input type="file" required>
            </div>
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