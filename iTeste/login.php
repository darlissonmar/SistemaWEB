<!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="www-sitename-com" data-template-set="html5-reset">

	<meta charset="utf-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>

	<link rel="stylesheet" href="css/style.css">

	<!-- all our JS is at the bottom of the page, except for Modernizr. -->
	<script src="js/modernizr-1.7.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body background="images/fundo.jpg">

<div class="wrapper"><!-- not needed? up to you: http://camendesign.com/code/developpeurs_sans_frontieres -->

    <div id="box">
        <div id="login-box">
            <div id="login-box-title">
                <div id="login-box-logo"></div>
            </div>
            <div id="login-box-content">
                <form action="action.php" name="form1" method="post">
                    <label>Usuário: </label><input type="text" name="login" size=25 />
                    <br/><br/>
                    <label>Senha: </label><input type="password" name="senha" size=25 />
                    <br/><br/>
                    <input type="image" src="images/botao.png" name="button" value="Enviar" />
                </form>
            </div>
        </div>
    </div>

</div>

<!-- here comes the javascript -->

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='_/js/jquery-1.5.1.min.js'>\x3C/script>")</script>

<!-- this is where we put our custom functions -->
<script src="js/functions.js"></script>

</body>
</html>
