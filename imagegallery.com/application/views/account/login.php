


<h1 class="mainArticle">Авторизация</h1>

<h3 class="mainArticle">С возвращением!</h3>


<div class="container">
<form action="/account/login" method="POST" class="registrationForm">
<input type="text" class="form-control" name="login" id="login" placeholder="Введите электронную почту"> <br>
<input type="password" class="form-control" name="password" id="password" placeholder="ваш пароль"> <br>
<button type="submit" class="btn btn-danger">авторизоваться</button>
<div class="alert alert-secondary" id = "loginAlert"><?php echo($error);?></div>
</form>







</div>


