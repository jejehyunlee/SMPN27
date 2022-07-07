<form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
            <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Kirimkan Pesan Singkat (SMS)</h3>
                </div>
              <div class='box-body'>

                <table class='table table-condensed table-bordered'>
                  <tbody>
                  	<tr><th width=120px scope='row'>No Telpon</th>  <td><input type='number' class='form-control' name='a' style='width:30%' placeholder='Input No Telpon...' required></td></tr>
                    <tr><th scope='row'>Isi Pesan</th> <td><textarea rows='6' class='form-control' name='b' placeholder='Tuliskan Pesan anda (Max 160 Karakter)...' onKeyDown=\"textCounter(this.form.b,this.form.countDisplay);\" onKeyUp=\"textCounter(this.form.b,this.form.countDisplay);\" required></textarea>
                    													<input type='number' name='countDisplay' size='3' maxlength='3' value='160' style='width:10%; text-align:center' readonly> Sisa Karakter</td></tr>
                  </tbody>
                  </table>
              </div>

              <div class='box-footer'>
                    <button type='submit' name='kirim' class='btn btn-info'>Kirimkan Pesan</button>
                    <button type='reset' class='btn btn-default pull-right'>Reset</button>
              </div>
            </div>
          </form>

<?php

if(isset($_POST['kirim'])) {
$to = $_POST['a'];
$msg = $_POST['b'];

$newkirim = sendsms($to, $msg);
    if($newkirim =="success"){

    echo "done";
    } else {
    echo "failed";

  }

}

function sendsms($to,$msg){
  //init SMS gateway, look at android SMS gateway
  $idmesin="1191";
  $pin="123";
  
  // create curl resource
  $ch = curl_init();
  
  // set url
  curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$to&text=$msg");
  
  //return the transfer as a string
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


  curl_setopt($ch, CURLOPT_SSL_VERYFYHOST,0);
  curl_setopt($ch, CURLOPT_SSL_VERYFYHOST,0);

  // $output contains the output string
  $output = curl_exec($ch);
  
  // close curl resource to free up system resources
  curl_close($ch);

  return($output);
  }