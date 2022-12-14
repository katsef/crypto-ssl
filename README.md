![](https://storage.yandexcloud.net/webazon/github/Webazon.CryptoSSL.jpg)

# crypto-ssl

## PHP библиотека шифрования на основе [OpenSSL](https://ru.wikipedia.org/wiki/OpenSSL) для безопасной передачи и обмена данными.

## Установка

Можно установить используя менеджер пакетов [Composer](https://getcomposer.org)

```bash
$ composer require webazon/crypto-ssl
```

или скачать пакет с [GitHub](https://github.com/katsef/crypto-ssl)

------

## Инициализация

```php
require __DIR__ . '/vendor/autoload.php';

$public_key = 'ПУБЛИЧНЫЙ_КЛЮЧ';
$private_key = 'ПРИВАТНЫЙ_КЛЮЧ';

$openSSL = new Webazon\CryptoSSL\OpenSSL($public_key,$private_key);
```

------

## Генерация пары ключей

```php
$keys = new Webazon\CryptoSSL\KeyPair();

$public_key = $keys -> getPublicKey();
$private_key= $keys -> getPrivateKey();
```



## Генерация произвольного рыбо-текста

string **fishText** ( [string *$type*] ,[int *$number*], [ strinf *$format* ] )

```php
$text=$openSSL -> fishText();
```

**Список необязательных параметров**

***type***        -      *sentence* 	 	  - вернет указанное количество предложений (по-умолчанию)
					   *paragraph* 		-  вернет указанное количество абзацев
					   *title* 					-  вернет указанное количество заголовков

***number***         *1-500* 				 - количество предложений, которые можно запросить единовременно 

​													(по-умолчанию: 3)
​						*1-100*				- то же самое, но для абзацев (по-умолчанию: 3)
​						*1-500*				- то же самое, но для заголовков (по-умолчанию: 1)

***format***        	*json* 				- вернет JSON-строку со статусом, текстом и кодом ошибки, если она есть
						*html*				- вернет чистый HTML

------



## Список доступных методов

#### Шифрование данных
text **encryptSSL** ( string *$text* )

```php
$encrypted = $openSSL -> encryptSSL($text);
```

#### Дешифровка данных

text **decryptSSL** ( string *$text* )

```php
$decrypted = $openSSL -> decryptSSL($encrypted);
```

------




## ![](https://storage.yandexcloud.net/webazon/github/massachusetts_institute_of_technology.png) License  

  ```русский
  © 2022 ИП Кацеф Алексей Михайлович
  ```

>  Настоящим предоставляется бесплатное разрешение любому лицу, получившему копию
  данного программного обеспечения и связанных с ним файлов документации ("Программное обеспечение"), использовать в Программном обеспечении без ограничений, включая, помимо прочего, права копировать, изменять, объединять, публиковать, распространять, сублицензировать и/или продавать копий Программного обеспечения, а также разрешить лицам, которым Программное обеспечение предоставляется для этого при соблюдении следующих условий:
>  Вышеприведенное уведомление об авторских правах и это уведомление о разрешении должны быть включены во все копии или существенные части Программного обеспечения.
>  ПРОГРАММНОЕ ОБЕСПЕЧЕНИЕ ПРЕДОСТАВЛЯЕТСЯ «КАК ЕСТЬ», БЕЗ КАКИХ-ЛИБО ГАРАНТИЙ, ЯВНЫХ ИЛИ ПОДРАЗУМЕВАЕТСЯ, ВКЛЮЧАЯ, ПОМИМО ПРОЧЕГО, ГАРАНТИИ КОММЕРЧЕСКОЙ ЦЕННОСТИ, ПРИГОДНОСТЬ ДЛЯ ОПРЕДЕЛЕННОЙ ЦЕЛИ И НЕНАРУШЕНИЕ ПРАВ. НИ ПРИ КАКИХ ОБСТОЯТЕЛЬСТВАХ АВТОРЫ ИЛИ ВЛАДЕЛЕЦ АВТОРСКИХ ПРАВ НЕ НЕСУТ ОТВЕТСТВЕННОСТЬ ЗА ЛЮБЫЕ ПРЕТЕНЗИИ, УЩЕРБ ИЛИ ДРУГОЕ. ОТВЕТСТВЕННОСТЬ, БУДУЩАЯ ПО ДОГОВОРУ, ДЕЛИКТУ ИЛИ ИНЫМ ОБРАЗОМ, ВОЗНИКАЮЩАЯ ИЗ, ВНЕ ИЛИ В СВЯЗИ С ПРОГРАММНЫМ ОБЕСПЕЧЕНИЕМ ИЛИ ИСПОЛЬЗОВАНИЕМ ИЛИ ДРУГИМИ СДЕЛКАМИ В ПРОГРАММНОГО ОБЕСПЕЧЕНИЯ.



  