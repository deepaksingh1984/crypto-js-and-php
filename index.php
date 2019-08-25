<?php error_reporting(E_ALL);?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>CryptoJS AES and PHP</title>
<body>
<form>
	<input type="text" name="data"><button name="sub" type="button">Submit</button>
</form>
<script type="text/javascript" src="libs/js/encryption.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="libs/js/aes-encryption.js"></script>


<script>
var dt = new Date();
var TheSecret = "";
$(document).ready(function(e) {
    $.ajax({
		url:'libs/php/get_random_key.php',
		type:'POST',
		data:"dts="+dt.getTime(),
		success: function(responseAjx){
			TheSecret = responseAjx;
			console.log(TheSecret);
		}
	});
});
$('button[name="sub"]').click(function(e) {
    var dataValue = $('input[name="data"]').val();
	var enData = CryptoJS.AES.encrypt(JSON.stringify(dataValue), TheSecret, {format: CryptoJSAesJson}).toString();
	$.ajax({
		url:'libs/php/decrypt.php',
		type:'POST',
		data:'crypt='+enData,
		success: function(cryptResponse){
			console.log(cryptResponse);
		}
	});
	
});
</script>
</body>
</html>