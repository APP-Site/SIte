<!DOCTYPE html>
<html>
<head>
	<title>formulaire d'inscription</title>
	<script src="check_formulaire.js"></script> <!--instruction to call JavaScript-->
</head>
<body>

<form method="post" action="formulaire_2.php" name="inscription" >

<label>Login : </label><input type="text" name="login"><br>
<label>Password : </label><input type="password" name="first_password"><br>
<label>Password (repeat) : </label><input type="password" name="password_checked"><br>

<input type="submit" name="envoi" value="Envoyer">



</form>

</body>
</html>
