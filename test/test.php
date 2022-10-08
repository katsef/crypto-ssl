<?php
echo '<div style="width: 320px;height: 48px;margin: 0 auto;border: 2px grey solid;padding: 4px;font-size: 16px;text-align:center;"><div style="color:blue;text-align:center;">CRYPTO-SSL</div><div style="color: black;text-align:center;">webazon/crypto-ssl</div><div>TEST</div></div><br /><hr /><br />';

//require __DIR__ . '/vendor/autoload.php';
require '../vendor/autoload.php';
if (!is_dir('json')){mkdir('json', 0777, true);}


$keys = new Webazon\CryptoSSL\KeyPair();

$SECURE_PUBLIC_KEY = $keys ->getPublicKey();
$SECURE_PRIVATE_KEY = $keys -> getPrivateKey();

$fp=fopen('json/public_key.pem','w');
fwrite($fp,$SECURE_PUBLIC_KEY);
fclose ($fp);
$fp=fopen('json/private_key.pem','w');
fwrite($fp,$SECURE_PRIVATE_KEY);
fclose ($fp);

echo $SECURE_PUBLIC_KEY;
echo '<br /><br />';
echo $SECURE_PRIVATE_KEY;
echo '<br /><br />';
	
$openSSL = new Webazon\CryptoSSL\OpenSSL($SECURE_PUBLIC_KEY,$SECURE_PRIVATE_KEY);

$text=$openSSL -> fishText();
echo $text;
echo '<br /><br />';
echo strtoupper(md5($text));
echo '<br /><br />';

$encrypted = $openSSL -> encryptSSL($text);
echo $encrypted;
echo '<br /><br />';

$fp=fopen('json/encrypted.txt','w');
fwrite($fp,$encrypted);
fclose ($fp);



$decrypted = $openSSL ->decryptSSL($encrypted);
echo $decrypted;
echo '<br /><br />';
$fp=fopen('json/decrypted.txt','w');
fwrite($fp,$decrypted);
fclose ($fp);
echo strtoupper(md5($decrypted));
echo '<br /><br />';
if (strtoupper(md5($decrypted)) == strtoupper(md5($text)))
{
echo '<div style="color:green;">!!! УСПЕШНО !!!</div>';	
}else{echo '<div style="color:red;">!!! НЕУДАЧА :( !!!</div>';	}


?>