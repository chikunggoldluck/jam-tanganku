<html>
<head>
    <title>UTS WEBSERVICE</title>

</head>
<body>

        <h3>Edit users</h3>
            <a href="/users">kembali</a>
        <br/>
        <br/>

        @foreach($users as $p)
        <form action="/users/update" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$p->id}}"><br/>
            name <input type="text" name="name" required="required"><br/>
            email <input type="text" name="email" required="required"><br/>
            <input type="submit" value="simpan data">
        </form>
        @endforeach
</body>
</html>
