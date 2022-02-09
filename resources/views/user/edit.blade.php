<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ユーザー登録</title>
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('user.store')}}" method="POST">
    <div class="mb-3">
        <label for="user_name" class="form-label">ユーザー名</label>
        <input name="user_name" type="text" class="form-control" id="user_name" value="{{$user->user_name}}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Eメール</label>
        <input name="email" type="text" class="form-control" id="email" value="{{$user->email}}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">パスワード</label>
        <input type="text" class="form-control" id="password">
    </div>
    <div class="mb-3">
        <label for="first_name" class="form-label">姓</label>
        <input name="first_name" type="text" class="form-control" id="first_name">
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">名</label>
        <input name="last_name" type="text" class="form-control" id="last_name">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">年齢</label>
        <input name="age" type="text" class="form-control" id="age">
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">性別</label><br>
        @foreach($genders as $key => $value)
            <input name="gender" type="radio" id="gender" value="{{$key}}"
                   @if($user->gender === $key)
                       checked
                   @endif
            >{{$value}}
        @endforeach
    </div>
    @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
