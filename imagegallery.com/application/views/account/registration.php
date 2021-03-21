



<h1 class="mainArticle">Регистрация</h1>

<h3 class="mainArticle"> будем знакомы?</h3>


<div class="container">
<form action="/account/registration" method="POST" class="registrationForm">
<input type="text" class="form-control" name="login" id="login" placeholder="введите электронную почту"> <br>
<input type="password" class="form-control" name="password" id="password" placeholder="ваш будущий пароль"> <br>
<input type="text" class="form-control" name="name" id="name" placeholder="пожалуйста, представтесь"> <br>
<button type="submit" class="btn btn-danger">зарегистрироваться</button>

<div class="alert alert-secondary" id = "loginAlert"><?php echo($error_reg);?></div>


</form>
</div>






