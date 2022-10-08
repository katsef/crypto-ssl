<?php
namespace Webazon\CryptoSSL;

use phpseclib3\Crypt\RSA;
function isJSON($string) {
    return ((is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string))))) ? true : false;
}	
class OpenSSL {
	
 private $public_key;
 private $private_key;
	

	
 public function __construct($public_key,$private_key)
    {
        $this->publicKey = $public_key;
        $this->privateKey = $private_key;
    }
	
	
	
public function getPublicKey()
    {
        return $this->publicKey;
    }
	
public function getPrivateKey()
    {
        return $this->privateKey;
    }	
	

public function generateKeyPair($bits = 2048)
	{
	$this->publicKey = RSA::createKey($bits);
	$this->privateKey = $private->getPublicKey();
	
	
	}
	

	
public function fishText($type = 'sentence', $number = 3, $format = 'json')
	{
	$res =  file_get_contents('https://fish-text.ru/get?type='.$type.'&number='.$number.'&format='.$format);
	if (isJSON($res))
		{
		$res=json_decode($res,true);
		if ($res['status']=='success'){return $res['text'];}else{return false;}
		}else{return $res;}
	}
	

	
public function encryptSSL($text)
	{
	
	$f=true;
	$len = RSA::loadPublicKey($this->publicKey)->getLength() / 8;
	$len = $len - 16;
	$ar=array();
	$j=0;$c=0;
	while ($j<strlen($text))
		{
		$s=substr($text,$j,$len);
		$pk  = openssl_get_publickey($this->publicKey);
		openssl_public_encrypt($s, $encrypted, $pk, OPENSSL_PKCS1_PADDING );
		if (strlen($encrypted)>0){
			array_push($ar,base64_encode($encrypted));
			$j=$j+$len;
			$c++;
			}else{$f=false;break;}
		
		}
	if ($f)
		{
		$req='--- BEGIN SSL DATA ---'.chr(10);
		for ($i=0;$i<$c;$i++){$req=$req.$ar[$i].chr(10);}
		$req=$req.'--- END SSL DATA ---';
		}
	if ($f){return $req;}else return false;
	}
	
	
public function decryptSSL($text)
	{
	$s=$text;
	$json='';
	$status_encrypt=true;
	$p=strpos($s,'--- BEGIN SSL DATA ---');
		if ($p!==false)
			{
			$p=strpos($s,'--- END SSL DATA ---');
				if ($p!==false)
					{
					$a=explode(chr(10),$s);
					
					for($i=1;$i<count($a)-1;$i++)
						{
						$pk  = openssl_get_privatekey($this->privateKey);
						openssl_private_decrypt(base64_decode($a[$i]), $out, $pk, OPENSSL_PKCS1_PADDING);
						if (strlen($out)>0)
							{
							$json=$json.$out;
									
							
						
						
							}
							else
							{
							$status_encrypt=false;
							break;	
							}
						}
				if ($status_encrypt)
					{
					return $json;
					}
				}else{return false;}
		}else{return false;}
	
	
	}
	
	
}




?>