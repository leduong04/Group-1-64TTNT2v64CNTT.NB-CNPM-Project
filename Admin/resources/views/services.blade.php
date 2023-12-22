@extends('templates.tpl_default', ['pageId'=>'dashboard'])
@section('css')
    <link rel="stylesheet"  href="{{ asset('assets/css/dashboard.css') }}">  
    <link rel="stylesheet"  href="{{ asset('assets/css/sidebar.css') }}">  
    <link rel="stylesheet"  href="{{ asset('assets/css/employee.css') }}">  

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
      <span class="text">Quản lý dịch vụ</span>
    </div>
    <div class="data-table">
        <div class="add-employ">
            <button type="submit" class="mb-4"><i class="fa-solid fa-bell-concierge"></i> Thêm dịch vụ mới</button>
        </div>
      <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
          <tr>
            <th>Tên dịch vụ</th>
            <th>Giá dịch vụ</th>
            <th style="width: 40%">Mô tả</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $row)
            <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->price }}</td>
                <td>{{ $row->MoTa }}</td>
                <td>
                    <button type="submit" class="btn-edit">Sửa</button>
                    <button type="submit" class="btn-delete">Xoá</button>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </section>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
@endsection