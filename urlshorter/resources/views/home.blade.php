<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL SHORTENER</title>
    <link rel="stylesheet" href="{{URL::to('css/global.css')}}">
</head>
<body>
    <div class="container">
        <h2 class="title">Shorten a Url.</h2>

        @if($errors->has('url'))
    <p>{{$errors->first('url')}}</p>

        @endif

        @if(Session::has('global'))
    <p>Here is your shortlink <a href="{{Session::get('global')}}">{{Session::get('global')}}</a></p>
        @endif
        <div class  ="form-control">
    <form action="{{ action('LinkController@make') }}" method="POST">
        {{ csrf_field() }}

    <input type="url" name="url" placeholder="Enter a URL" autocomplete="off" {{Request::old('url') ? 'value ='.e(Request::old('url')).'' : ''/*BURADA ÖNCEKİ İNPUTU ALDIK*/}}>
        <input type="submit" value="Shorten" >

    </form>
        </div>
    </div>
</body>
</html>
