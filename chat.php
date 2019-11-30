<?
//exit();
$js= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
			<div id="dl_chat_box"></div>
			<script>$("#dl_chat_box").load("chatbox.php/?f='.$_GET['f'].'");</script>';
$css = '<link rel="stylesheet" href="chat.css"/><link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">';

function get_data($url)
{
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

if(isset($_GET['f'])){
	$url=$_GET['f'];
	$page=get_data($url);
	$page = str_replace('</body>', $js.'</body>',$page);
	$page = str_replace('</head>', $css.'</head>',$page);
	echo $page;
	exit();
}
?>

<html>
<head>
<?
echo $js;
echo $css;

?>
<title>Yew</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<div>
    	<input type="text" id="fakepage"/>
        <a href="javascript:fakepage();" onClick="fakepage()">
        	Load
        </a>
        <a href="javascript:postMsg();" onClick="postMsg()">
        	Post
        </a>
    </div>
</body>
</html>
