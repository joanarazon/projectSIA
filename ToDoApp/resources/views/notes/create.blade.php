<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Notes</h1>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                
            @endforeach
        </ul>
            
        @endif
    </div>
    <form method="post" action="{{route('note.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="title">
        </div>
        <div>
            <label>Content</label>
            <input type="text" name="content" placeholder="content">
        </div>
        <div>
            <input type="submit" value="Save new Note"/>
        </div>
    </form>
</body>
</html>