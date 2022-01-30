<html>
<head>
    <title>UTS WEBSERVICE</title>

</head>
<body>

        <h3>TAMBAH DATA</h3>
            <a href="/users">kembali</a>
        <br/>
        <br/>

        <form action="/users/store" method="post">
            {{ csrf_field() }}
            name <input type="text" name="name" required="required"><br/>
            email <input type="text" name="email" required="required"><br/>
            <input type="submit" value="Simpan Data">
        </form>
</body>
</html>
