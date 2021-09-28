<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=""method="post">
    @csrf
  <label for="fname">name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="email">email:</label><br>
  <input type="email" id="email" name="email">
  <input type="submit"id="send" name="send">

    </form>
</body>
</html>