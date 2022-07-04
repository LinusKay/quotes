<!-- 
None of the quotes included on this website reflect the views of the creator.
Quotes sourced from: https://www.kaggle.com/fantop/wikiquote-short-english-quotes
-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php
$json_file = file_get_contents('quotes-100-en.json');
$json = json_decode($json_file, true);

$topic = array_rand($json, 1);
$topic_format = str_replace(" ", "_", $topic);
$num_quotes = count($json[$topic]);

$quote = $json[$topic][mt_rand(0, count($json[$topic]) -1)];
?>
<title><?php echo $topic . ' - ' . $quote;?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet"> 
<style>
*{
	margin:0;
	padding:0;
}
body{
	width:100vw;
	height:100vh;
	background-image: linear-gradient(to bottom right, #26547c, #19808a);
}
p{
	color:#fff;
}
.topic{
	font-size:25px;
	text-decoration:underline;
	opacity:0.5;
	font-family: 'Roboto', sans-serif;
}
.quote{
	font-size:45px;
	opacity:0.8;
	font-family: 'Playfair Display', serif;
}
.quote:hover{
	cursor:copy;
}
.quote:active{
	opacity:1;
}
.wrap{
	height:100vh;
	width:99vw;
	position:absolute;
}
.wrap-quote{
	width:50%;
	margin:30vh auto;
	padding:50px;
	animation: fadein 2s, slideup 1s, borderin .7s 1s forwards;
}
@keyframes fadein{
	from{opacity:0;}
	to{opacity:1;}
}
@keyframes slideup{
	from{margin-top:32vh;}
	to{margin-top:30vh;}
}
@keyframes borderin{
	from{border:solid 5px rgba(255,255,255,0);}
	to{border:solid 5px rgba(255,255,255,.3);}
}
a{
	color:white;
}
.logo{
	position:relative;
	width:50px;
	top:25px;
	left:25px;
	opacity:0.5;
}
.logo:hover{
	opacity:1;
}
</style>
</head>
<body>

<div class="wrap">
<a href="https://libus.xyz/"><img class="logo" src="logo.png"></a>
	<div class="wrap-quote">
		<a href="https://en.wikiquote.org/wiki/<?php echo $topic_format;?>" target="_blank" class='topic'> <?php echo $topic ?> </a>
		<p class='quote' onclick='copyToClipboard(this)'> <?php echo $quote ?></p>
	</div>
</div>
<script>
function copyToClipboard(element) {
		  var $temp = $("<input>");
		  $("body").append($temp);
		  $temp.val($(element).text()).select();
		  document.execCommand("copy");
		  $temp.remove();
		}
</script>
</body>
</html>