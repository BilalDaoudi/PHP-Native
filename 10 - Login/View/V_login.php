<html>

<head>

    <title>Authentificataion</title>
    <link rel="icon" href="../Image/favicon.avif" type="image/ico">
    <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../style/Pages/Login.css"> -->
    <style>
         /* styles.css (reset) */

  * {
    box-sizing: border-box;
}

html,
body {
    height: 100%;

}

a,
input[type='submit'] {

    cursor: pointer;
}

/* styles.css */

@keyframes pan {

    100% {
        background-position: 15% 50%;
    }

}

body {

    display: grid;

    place-items: center;
    margin: 0;

    padding: 24px;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background: linear-gradient(100deg, rgb(0, 0, 255), rgb(255, 255, 255), rgb(0, 0, 255), rgb(0, 0, 255));
    background-size: 400% 400%;

    /* background-image: url("../Image/favicon.webp");
        background-repeat: no-repeat;

        background-size: cover;

        animation: pan 6s infinite alternate linear; */

}

@media (width >=500px) {
    body {

        padding: 0;

    }

}

/* styles.css */

.login-card {

    width: 90%;
    padding: 70px 30px 44px;
    border-radius: 24px;
    background: #ffffff;
    text-align: center;
}

@media (width >=500px) {
    .login-card {
        margin: 0;
        width: 400px;
    }

}

/* styles.css */

/* .login-card>h2 {
    margin: 0 0 12px;
    font-size: 36px;
    font-weight: 600;
} */

.login-card>h3 {
    margin: 0 0 30px;
    font-weight: 500;
    font-size: 16px;
    color: rgba(0, 0, 0, 0.38);
}

.login-form {
    width: 100%;

    margin: 0;
    display: grid;
    /* gap: 16px; */
}

.login-form>a {
    color: #216ce7;
}



.login-form>input,
select {
    height: 56px;
    border-radius: 8px;
    font-size: larger;
}


/* .login-form input,
select {
    border: 2px solid #ebebeb;

} */

.login-form input { 
    outline: none;
    border: none;
    border-bottom: 1px solid blue;
    height: 40px;
    width: 100%;
    font-weight: 600;
}

.login-form input[type='submit'] {
    margin-top: 10px;
    border: 0;
    background: #216ce7;
    height: 56px;
    color: #f9f9f9;
    font-weight: 600;
}

.title {
    color: rebeccapurple;
    margin-bottom: 20px;
    font-size: 30px;
    font-weight: 600;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    animation: slideInFromTop 1s ease-in-out;
}


@keyframes slideInFromTop {
    from {
        transform: translateY(-100%);
    }

    to {
        transform: translateY(0);
    }
} 
.erreur{
    margin-top: 10px;
    font-weight: 500;
    font-size: 12px;
    text-align: left;
    padding-left: 10px;
    color: red;
}
    </style>

</head>

<body>
    <div class="login-card">
        <form action="" method="post" class="login-form">
            <div class="title">
                <span>Connexion</span>
            </div>
            <div class="form-groupe">
                <label for="username"></label>
                <input type="text" id="username" class="form-control h-100" name="username" placeholder="Your Name" required value="<?= $login ?>">
            </div>
            <p class="erreur"><?= $erreurlogin ?></p>
            <div class="form-groupe">
                <label for="password"></label>
                <input type="password" class="form-control  h-100" name="password" placeholder="Your password" required value="<?= $password ?>">

            </div>
            <p class="erreur"><?= $erreurpass ?></p>
            <input type="submit" name="btnConnecte" value="Login" />

        </form>
    </div>
</body>

</html>