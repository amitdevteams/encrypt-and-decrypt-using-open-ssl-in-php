<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $res = openssl_pkey_new();
  openssl_pkey_export($res, $privkey, "PassPhrase number 1"); {
    // Get details of public key
    $pubkey = openssl_pkey_get_details($res);
    $pubkey = $pubkey["key"];
    $rsaKey = openssl_pkey_new(array( 
      'private_key_bits' => 4096,
      'private_key_type' => OPENSSL_KEYTYPE_RSA,
    ));
    $privKey = openssl_pkey_get_private($rsaKey); 
    openssl_pkey_export($privKey, $pem);


    //download in privatekey.pem file
    file_put_contents('publickey.pem', $pubkey);
    file_put_contents('privatekey.pem', $pem);
    // download function start here
    ob_clean();
    header('Content-Description: File Transfer');
    header('Content-Type: application/x-pem-file');
    header("Content-Disposition: attachment; filename=public.pem");
    exit(readfile('privatekey.pem'));
    // var_export($pubkey, $return)
    // var_dump($privkey);
    // var_dump($pubkey);
  }
}
?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>RSA KEY Generator</title>
</head>

<body>
  <div class="container">
    <div class="my-5">
      <form action="./rsagen.php" method="POST">
        <div class="row row-cols-2">
          <div class="p-3">
            <label for="privatekey">Private Key</label>
            <textarea class="form-control" name="privatekey" id="privatekey" rows="3">
                          <?php echo $privkey ?? null ?></textarea>
          </div>
          <div class="p-3">
            <label for="publickey" class="form-lable">Public Key</label>
            <textarea class="form-control" name="publickey" id="publickey" rows="3"><?php echo $pubkey ?? null ?></textarea>
          </div>
          <div class="mt-5 text-end">
            <button class="btn btn-primary">Generate Key File</button>
          </div>
        </div>
      </form>
      <br><br>



    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>