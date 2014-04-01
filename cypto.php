<?php
// App::uses('Component', 'Controller');

// class CryptoComponent extends Component {

	function getDecrypt($sStr, $sKey) {
	    return trim(mcrypt_decrypt(
		        MCRYPT_RIJNDAEL_128, 
		        $sKey, 
		        base64_decode($sStr), 
		        MCRYPT_MODE_ECB
	    ));
	}

	function getEncrypt($sStr, $sKey) {
	    return base64_encode(
	        mcrypt_encrypt(
	            MCRYPT_RIJNDAEL_128, 
	            $sKey,
	            $sStr,
	            MCRYPT_MODE_ECB
	        )
	    );
	}


$secretKey = "a8a8f7a57056bdf8a9a2bda664f4f677";

print_r($_GET['p']);

echo "<br/>";

// $p = urldecode("4qvLsKdv8%2B3D%2F%2BuJLZV2ga%2F%2BRvsp1rIIvL6lAZGRyNN7hYWrPbvoUnw8TybZ22dURb%2BkSCLDM47Hgsd1j2xlVw%3D%3D");
// echo $p;echo "<br>";
$p = urldecode($_GET['p']);

$replacedStr = str_replace(array('_','-'), array('/','+'), $p);
print_r($replacedStr);
echo "<br/>";

$dec_str = getDecrypt($replacedStr,$secretKey);
print_r($dec_str);
echo "<br/>";

// $ori = "testStr";
// $enc_str = getEncrypt($ori,$secretKey);
// $replace = str_replace(array('/','+'), array('_','-'), $enc_str);
// print_r($replace);

// }
?>