<html>

<head>
    <title></title>

    <style>
         body {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(100deg, #00FFFF, #008AD7, #00FFFF, #008AD7);
            background-size: 400% 400%;
        }
        .logo img {
            padding: 150px;
            width: 440px;
            height: 400px;
            border-radius: 50%;
        }

        .all {
            display: flex;
        }
        .Connecte{
            text-align: center;
            padding:130px;

            
        }
        h1{
            color: #324B4C;
            font-size: 65px;
        }
        form{
            color: #FFE964;
            font-size: 25px;
        }
        input{
            text-align: center;
            font-size: 18px;
            background-color: #E3E0F3;
            outline: none;
            border: none;
            border-bottom: 1px solid black;
            border-radius: 20px;
            width: 300px;
            height: 40px;
        }
        input[type="submit"]{
            text-align: center;
            background-color: black;
            color: #00FFFF;
            outline: none;
            border: 1px solid white;
            border-radius: 20px;
            width: 150px;
            height: 35px;
        }


    </style>
</head>

<body>

    <div class="all">


        <div class="logo">
            <img src="../Icon_Photo/Logo.jpg" width="20%">
        </div>

        <div class="Connecte">
            <h1>Welcome</h1>
            <form action="" method="POST">
                <label for="login">Login</label><br>
                <input type="text" name="tlogin" id="login"><br><br>
                <label for="Password">Password</label><br>
                <input type="password" name="tPassword" id="Password"><br><br>
                <input type="submit" name="btnConnecte" id="btnConnecte" value="Connecte"><br><br>
            </form>

        </div>
    </div>



</body>

</html>