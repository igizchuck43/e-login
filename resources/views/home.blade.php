<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    

    @auth
       <p>Congs You ARe Logged In</p> 

       <form action="/logout" method="POST">
        @csrf

       <button> Logout </button> 
    
        </form>

        <div style="border: 3px solid black">
            <h2>Create a post</h2>

            <form action="/create-post" method="POST">
             @csrf
                <input type="text" name="title" placeholder="Blog title">
                <br> <br>
                <textarea name="body" placeholder="body content..."></textarea>
                <br> <br> 
                <button>Save Post</button>
                <br> <br>
            </form>
            
        </div>

        <div style="border: 3px solid black">
            <h2>My Post</h2>
            @foreach ($posts as $post)
                <div style="background-color: gray; margin:10px; padding:10px">
                    <h3>{{$post['title']}}</h3>
                    {{$post['body']}}
                </div>
               

            @endforeach
        </div>
           
    @else
    <div style="border: 3px solid black">
        <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" placeholder="name" name="name">
                <input type="text" placeholder="email" name="email">
                <input type="password" placeholder="password" name="password">
                <br> <br>
            <button>Register</button>
            <br>
            <br>
            </form>
    </div>
    <br>
    <div style="border: 3px solid black">
        <h2>Log In</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" placeholder="name" name="loginname">
                {{-- <input type="text" placeholder="email" name="email"> --}}
                <input type="password" placeholder="password" name="loginpassword">
                <br> <br>
            <button>Log in</button>
            <br>
            <br>
            </form>
    </div>

    @endauth

    
</body>
</html>