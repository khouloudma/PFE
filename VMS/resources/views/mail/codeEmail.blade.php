<h1>Hello {{$mail_data['name']}}!</h1>
<center> 
<h3>Welcome to our entreprise.</h3>
<h4 style="color:red;">This is your code</h4><br>
 <?php $pathfile=$mail_data['Qrcode']; ?>
 <img src="{{ $message->embed(public_path($pathfile)) }}" style="width:100px;height:100px;margin-left:5px;">


 <br><br></center>
 Ps: this Qr code is used to check out
 <br><br>
                You'are demanded to present this code before leaving the entreprise.
<br>
Have a Good Day .