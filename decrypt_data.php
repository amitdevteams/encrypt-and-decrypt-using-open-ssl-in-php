<?php

// Generate keys in console:
// $ openssl genrsa -out private_key 8192
// $ openssl rsa -in private_key -out public_key.pem -pubout -outform PEM
// Test data
$data = 'Hello world';

// Encrypt data with public key
$publicKey = file_get_contents('publickey.pem');
$encrypted = null;

openssl_public_encrypt($data, $encrypted, $publicKey);

echo 'Encrypted data', PHP_EOL;
echo base64_encode($encrypted), PHP_EOL;

echo PHP_EOL;

// Decrypt data with private key
$privateKey = file_get_contents('privatekey.pem');
$decrypted = null;

openssl_private_decrypt($encrypted, $decrypted, $privateKey);

echo 'Decrypted data', PHP_EOL;
echo $decrypted, PHP_EOL;
echo $data;

?>