<?php
		/*
		Plugin Name:Inquiry Form to Posts or Pages
		Plugin URI: http://www.mclanka.com
		Description: Simple Inquiry form for a post or page.
		Author: Udamadu
		Version: 1.0
		*/
	?>
<?php

function inq_admin() {
			include('inq_form.php');
		}

		function inq_admin_actions() {
			add_options_page("Manage  Post or Page Inquiry form", "Manage  Post or Page Inquiry form", 1, "Manage  Post or Page Inquiry form", "inq_admin");
		}

		add_action('admin_menu', 'inq_admin_actions');
                
                
 function load_jq() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'load_jq');            
                
 function inquiry_form() {

$form_action    = get_permalink();
$post_title=get_the_title();


if(get_option('inq_header')){
$header=get_option('inq_header');
}else{
    $header="Inquiry Form for this Post";
}

if(get_option('inq_item_lable')){
$item_lable=get_option('inq_item_lable');
}else{
    $item_lable="Item Name";
}

if(get_option('inq_email_feild_lable')){
    $email_lable=get_option('inq_email_feild_lable');
}else{
    $email_lable='Your Email';
}

if(get_option('inq_name_feild_lable')){
    $name_lable=get_option('inq_name_feild_lable');
}else{
    $name_lable='Your Name';
}
if(get_option('inq_message_feild_lable')){
    $inq_msg_lable=get_option('inq_message_feild_lable');
}else{
    $inq_msg_lable='Inquiry Message';
}

if(get_option('inq_suc_msg')){
    $inq_suc_msg=get_option('inq_suc_msg');
}else{
    $inq_suc_msg='Thank you for your Inquiry. We will contact you shortly to answer your questions.';
}

if(get_option('inq_form_style')){
    $inq_style=get_option('inq_form_style');
}else{
    $inq_style='div#inquiry-form{
padding:10px;

}
div#inquiry-form label {
    display: block;
    font-size: 13px;
    font-weight: bold;
    margin: 5px 10px;
}
div#inquiry-form input.inq-text {
    display: block;
    height: 35px;
    margin: 0 10px 10px;
    width: 400px;
background:white;
}
div#inquiry-form textarea {
    height: 140px;
    margin-left: 10px;
    width: 400px;
background:white;
}
div#inquiry-form input.inq-submit {
    display: block;
    height: 50px;
    margin: 10px;
    width: 200px;
}

div#inquiry-form span.req {
    color: orange;
    font-size: 20px;
}';
}


if($_GET['suc']==1){
    if(get_option('inq_suc_msg')){ $inq_form_success= '<p style="color: green; font-weight:bold">'.get_option('inq_suc_msg').'</p>'; }else{ $inq_form_success= $inq_suc_msg;};
  
}
else{
    $inq_form_success='';
}

$rand_no_1=$_SESSION['no1'];
$rand_no_2=$_SESSION['no2'];
$oparator_no=$_SESSION['operator_no'];
$operator=$_SESSION['operator'];

if($rand_no_2>$rand_no_1){
    $temp=$rand_no_1;
    $rand_no_1=$rand_no_2;
    $rand_no_2=$temp;
}
$cap_val=str_pad($rand_no_1,2,'0',STR_PAD_LEFT).str_pad($rand_no_2,2,'0',STR_PAD_LEFT).$oparator_no;

$form = <<<EOT

<style type="text/css">
 {$inq_style}

</style>

<div id="inquiry-form"><h3>{$header}</h3>
<div id="send-msg"></div>

	{$inq_form_success}
     
   <form name="inq_form"  action="{$form_action}" method="post" enctype="multipart/form-data" style="text-align: left">
   <p><label for="name">{$item_lable}</label><input type="text" name="product" id="product" value="{$post_title}" size="22" class="inq-text" readonly /> </p>
   <p><label for="name">{$name_lable}<span class="req">*</span></label><input type="text" name="name" id="name" value="" size="22" class="inq-text" /> </p>
   <p><label for="email">{$email_lable}<span class="req">*</span></label><input type="text" name="email" id="email" value="" size="22" class="inq-text" /> </p>
   <input type="hidden" name="val" id="val" value="{$cap_val}" />
   <p><label for="message">{$inq_msg_lable}</label><textarea name="message" id="message" cols="100%" rows="10">type your message here...</textarea></p>

   <p>Fill the Correct value<span class="req">*</span></p>
   <p>{$rand_no_1}{$operator}{$rand_no_2}= <input type="text" name="cap" id="cap" size="4" />
   
   <p><input name="send" type="submit" id="send" value="Inquiry" onclick="return validateInquiryForm()" class="inq-submit"/></p>
   
   <input type="hidden" name="inq_form_submitted" value="1">
   
   </form>
   
</div>

EOT;

return $form;

}

add_shortcode('inquiry_form', 'inquiry_form');


function inquiry_form_process() {

session_start();


if(get_option('inq_email_to')){
    $email_to=get_option('inq_email_to');
}else{
    $email_to=get_settings('admin_email');// get site admin email
}

if(get_option('inq_err_captcha')){
    $cap_error=get_option('inq_err_captcha');
}else{
    $cap_error='Error: please fill the correct value.';
}
if(get_option('inq_err_email')){
    $email_error=get_option('inq_err_email');
}else{
    $email_error='Error: please enter a valid email address.';
}
if(get_option('inq_err_name')){
    $name_err=get_option('inq_err_name');
}else{
    $name_err='Error: please enter your name.';
}



$_SESSION['no1']=rand(0, 10);
$_SESSION['no2']=rand(0, 10);
$_SESSION['operator_no']=time()%3;
$_SESSION['operator']=captchaOparator($_SESSION['operator_no']);


 //if ( !isset($_POST['inq_form_submitted']) ) return;
if ( isset($_POST['inq_form_submitted']) ) {
 $product=( isset($_POST['product']) )  ? trim(strip_tags($_POST['product'])) : null;
 $name  = ( isset($_POST['name']) )  ? trim(strip_tags($_POST['name'])) : null;
 $email   = ( isset($_POST['email']) )   ? trim(strip_tags($_POST['email'])) : null;
 
 $message = ( isset($_POST['message']) ) ? trim(strip_tags($_POST['message'])) : null;
 $cap = ( isset($_POST['cap']) ) ? (int)trim(strip_tags($_POST['cap'])) : null;
 $val=$_POST['val'];
 $result=captchaGenarator($val);
 

 if ( $name == '' ) wp_die($name_err);
 if ( !is_email($email) ) wp_die($email_error);
 
 if ( ($cap != $result) ) wp_die($cap_error);
 
$to=$email_to;
$from=$email;
$sub="Inquery for ".$product;


$body='<p>Item Name :'.$product.'</p>
       <p>Customer Name :'.$name.'</p>
       <p>Customer Email :'.$email.'</p>
       <p>Message :'.$message.'</p>';



if ( !sendHTMLemail($body,$from,$to,$sub) ) wp_die($cap_error);

$_SESSION['inq_form_success'] = 1;

 
 header('Location: ' . $_SERVER['HTTP_REFERER'].'?suc=1');
 exit();

} 
else{
    inquiry_form();
}
}

add_action('init', 'inquiry_form_process');

function inquiry_form_js() { ?>

<script type="text/javascript">

 function validateMail(mail) {

   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = mail;
   if(reg.test(address) == false) {


      return false;
   }
   else return true;
}

function validateInquiryForm(){

    email=document.inq_form.email.value;
    name=document.inq_form.name.value;
    loadDiv=document.getElementById('send-msg');


    if ((name.length==0) ||
   (name==null)) {
		$('div#inquiry-form input#name').css('background','orange');
		 err1=1
	 }else{
             err1=0;
             $('div#inquiry-form input#name').css('background','white');
         }


	if(!validateMail(email)){
		$('div#inquiry-form input#email').css('background','orange');
	          err2=1;
       }
           else{ err2=0;
           $('div#inquiry-form input#email').css('background','white');
       }




	 if((err1==0) && (err2==0)){
         return true;

         }
         else{

             return false;

         }
}
</script>

<?php }

add_action('wp_head', 'inquiry_form_js');

/***utility functions*************/

function sendHTMLemail($HTML,$from,$to,$subject) {//email function
$headers = "From: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$boundary = uniqid("HTMLEMAIL");
$headers .= "Content-Type: multipart/alternative;".
                "boundary = $boundary\r\n\r\n";
$headers .= "This is a MIME encoded message.\r\n\r\n";
$headers .= "--$boundary\r\n".
                "Content-Type: text/plain; charset=ISO-8859-1\r\n".
                "Content-Transfer-Encoding: base64\r\n\r\n";
$headers .= chunk_split(base64_encode(strip_tags($HTML)));
$headers .= "--$boundary\r\n".
                "Content-Type: text/html; charset=ISO-8859-1\r\n".
                "Content-Transfer-Encoding: base64\r\n\r\n";
$headers .= chunk_split(base64_encode($HTML));
if( mail($to,$subject,"",$headers))
   return true;
   else
   return false;
}

function captchaGenarator($cap_String){

    $rand1=(int)substr($cap_String,0,2);
    $rand2=(int)substr($cap_String,2,2);
    $op=(int)substr($cap_String,4,1);

    switch ($op)
{
case 0:
    $result=$rand1+$rand2;

  break;
case 1:
   $result=$rand1-$rand2;
  break;
case 2:
  $result=$rand2*$rand1;
  break;
}
return $result;

}

function captchaOparator($op){

    switch ($op)
{
case 0:
   return '+';

  break;
case 1:
  return '-';
  break;
case 2:
 return 'x';
  break;


default:
return '+';
}
}                  
