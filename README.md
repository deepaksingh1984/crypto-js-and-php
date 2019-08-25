# cryptojs-to-php
This is a demo of sending encrypted data using crypto js and php

# Why to use this method
To prevent Man-in-the-middle (mitm) attacks. 
Maximum cyber attacks occurs mitm attacks. It means the attcker can seen (intercept) your data before the server receives it from your browser. What if the data we send is already encrypted on the browser itself and send it to server. It is where thre crypto-to-php method works.

# How to use it
Just enrypt the data using the method below:

`CryptoJS.AES.encrypt(JSON.stringify(dataValue), TheSecret, {format: CryptoJSAesJson}).toString();`
`dataValue` is your input value the `TheSecret` is your secret key. You can use your custom random genrated secret key, I have used time() for demo purpose. You can use https://github.com/deepaksingh1984/secureKey-in-php for your custom secret key encyption and decryption.


The method I used to acheive the purpose (just for demo purpose)
```
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
```

