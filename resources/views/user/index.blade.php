<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ユーザー表示</title>
</head>
<body>
<style>
    .clickable:hover{
        cursor: pointer;
        color: #0c84ff;
    }
</style>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">ユーザー名</th>
        <th scope="col">メールアドレス</th>
        <th scope="col">年齢</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr class="clickable" data-href="{{route('user.edit', $user)}}">
            <th scope="row">{{ $user->id }}</th>
            <td>{{$user->user_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->age}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script>
    jQuery( function($) {
        $('tbody tr[data-href]').addClass('clickable').click( function() {
            window.location = $(this).attr('data-href');
        }).find('a').hover( function() {
            $(this).parents('tr').unbind('click');
        }, function() {
            $(this).parents('tr').click( function() {
                window.location = $(this).attr('data-href');
            });
        });
    });
</script>
</body>
</html>
