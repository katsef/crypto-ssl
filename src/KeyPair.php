<?php
namespace Webazon\CryptoSSL;

use phpseclib3\Crypt\RSA;

class KeyPair {
	
 
	
	
 public function __construct($bits = 2048)
    {
    $this->privateKey = RSA::createKey($bits);
	$this->publicKey = $this->privateKey->getPublicKey();   
    }
	
	
	
public function getPublicKey()
    {
        return $this->publicKey;
    }
	
public function getPrivateKey()
    {
        return $this->privateKey;
    }	
	


	
}




?>