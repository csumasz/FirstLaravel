
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/fruit.css">
    
    
</head>
<body>
    @if (\Session::has('success'))
        <div class="alert alert-success mymessage">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <td class="fruit">Gyümölcs</td>
                <td class="fruit">Készlet(kg)</td>
                <td class="fruit">Ár</td>
                <td class="fruit">Vásárlás</td>
            </tr>
        </thead>
        <tbody>
           
        <?php 
            use Illuminate\Support\Facades\DB;
            $fruits = DB::select('select * from termek'); 
        ?>
        <form action="/store" method="POST">
            @CSRF
            @foreach ($fruits as $fruit)
            <tr name="row{{$fruit->id}}">
                <td class="fruit" name="row{{$fruit->id}}">{{$fruit->name}}</td>
                <td class="fruit" name="row{{$fruit->id}}">{{$fruit->piece}}</td>
                <td class="fruit" name="row{{$fruit->id}}">{{$fruit->price}}</td>
                <td>
                    <input type="number" class="piece" name="row{{$fruit->id}}" value="0">
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                    <button type="submit" class="toCard">Kosárba!</button>
                </td>
            </tr>    
        </form>
    </tbody>
</table>

<div>
    <form class= "form-horizontal" action="/card" method="POST" name="upload_excel"   
                enctype= "multipart/form-data" >
                @csrf
            <div class= "form-group" >
                    <div class= "col-md-4 col-md-offset-4" >
                        <input type="submit" name= "Export" class="toCard" value="Kosár letöltése!">
                    </div>
            </div>                    
    </form>           
</div>   
</body>
</html>