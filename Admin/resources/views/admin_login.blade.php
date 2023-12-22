<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="{{ asset('assets/css/login.css') }}">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                   <header>Đăng nhập</header>
                   <form action="{{ route('admin/checklogin') }}" method="post">
                    @csrf
                    <div class="input-field">
                        <input type="text" class="input" id="email" name="email">
                        <label for="email">Email</label> 
                        @error('email')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div> 
                    <div class="input-field">
                        <input type="password" class="input" id="password" name="password">
                        <label for="pass">Mật khẩu</label>
                        @error('password')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div> 
                    <div class="input-field">
                        @error('notification')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div> 
                    <div class="input-field">
                        <input type="submit" class="submit" value="Đăng nhập">
                    </div> 
                   </form>
                </div>  
            </div>
        </div>
    </div>
</div> 
</html>