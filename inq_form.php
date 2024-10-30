<style type="text/css">
    div#inq-single-post-wrap {
    margin: auto;
    padding: 10px;
    width: 900px;
}
    div#inq-single-post-wrap h2 {
    font-size: 30px;
    text-align: center;
}
    div#inq-single-post-wrap h4 {
    font-size: 20px;
}

div#inq-single-post-wrap form p {
    margin: 30px 0;
}
    div#inq-single-post-wrap form input[type="text"] {
    border: 1px solid #999999;
    border-radius: 5px 5px 5px 5px;
    display: block;
    height: 30px;
    padding: 5px;
    width: 700px;
}
    div#inq-single-post-wrap form input[type="submit"]{
        
        
    }
    div#inq-single-post-wrap form textarea {
    border: 1px solid #999999;
    border-radius: 5px 5px 5px 5px;
    display: block;
    height: 200px;
    width: 705px;
}

div#inq-single-post-wrap div#mclanka {
    font-size: 14px;
    font-style: italic;
    font-weight: bold;
}
div#inq-single-post-wrap div#mclanka a:link ,div#inq-single-post-wrap div#mclanka a:visited {
     color: red;
     text-decoration: none;
}
div#inq-single-post-wrap div#mclanka a:link ,div#inq-single-post-wrap div#mclanka a:hover {
    text-decoration: underline;
}
div#inq-single-post-wrap div#mclanka a:link ,div#inq-single-post-wrap div#mclanka a img {
    padding: 10px;
    vertical-align: middle;
}
</style>


<div id="inq-single-post-wrap">  
    <?php    echo "<h2>" . __( 'Inquiry Settings', 'inquiry_for_single' ) . "</h2>"; ?>  
    <?php
     if($_POST['inq_hidden'] == 'Y') {  
        //Form data sent  
        if( $_POST['inq_header']){
        update_option('inq_header', $_POST['inq_header']);

        }else{
         update_option('inq_header','Inquiry Form for this Post');     
        }
        
         if( $_POST['inq_item_lable']){
        update_option('inq_item_lable', $_POST['inq_item_lable']);  
        
        }else{
         update_option('inq_item_lable','Item Name');     
        } 
  
        if( $_POST['inq_email_feild_lable']){
        update_option('inq_email_feild_lable', $_POST['inq_email_feild_lable']);  
        
        }else{
         update_option('inq_email_feild_lable','Your Email');     
        } 
  
       if( $_POST['inq_name_feild_lable']){
        update_option('inq_name_feild_lable', $_POST['inq_name_feild_lable']);  
        
        }else{
         update_option('inq_name_feild_lable','Your Name');     
        } 
  
        if( $_POST['inq_message_feild_lable']){
        update_option('inq_message_feild_lable', $_POST['inq_message_feild_lable']);  
        
        }else{
         update_option('inq_message_feild_lable','Inquiry Message');     
        } 
        
         if( $_POST['inq_email_to']){
        update_option('inq_email_to', $_POST['inq_email_to']);  
        
        }else{
         update_option('inq_email_to',get_settings('admin_email'));     
        } 
        
          if( $_POST['inq_suc_msg']){
        update_option('inq_suc_msg', $_POST['inq_suc_msg']);  
        
        }else{
         update_option('inq_suc_msg','Thank you for your Inquiry. We will contact you shortly to answer your questions.');     
        } 
        
        if( $_POST['inq_err_captcha']){
        update_option('inq_err_captcha', $_POST['inq_err_captcha']);  
        
        }else{
         update_option('inq_err_captcha','Error: please fill the correct value.');     
        } 
         if( $_POST['inq_err_email']){
        update_option('inq_err_email', $_POST['inq_err_email']);  
        
        }else{
         update_option('inq_err_email','Error: please enter a valid email address.');     
        } 
        
         if( $_POST['inq_err_name']){
        update_option('inq_err_name', $_POST['inq_err_name']);  
        
        }else{
         update_option('inq_err_name','Error: please enter your name.');     
        } 
        
         if( $_POST['inq_form_style']){
        update_option('inq_form_style', $_POST['inq_form_style']);  
        
        }else{
         update_option('inq_form_style','
div#inquiry-form{ /*inquiry form wrapper div*/
padding:10px;
}
div#inquiry-form label { /*inquiry form form lables */
    display: block;
    font-size: 13px;
    font-weight: bold;
    margin: 5px 10px;
}
div#inquiry-form input.inq-text { /*inquiry form form text inputs*/
    display: block;
    height: 35px;
    margin: 0 10px 10px;
    width: 400px;
background:white;
}
div#inquiry-form textarea { /*inquiry form form textareas*/
    height: 140px;
    margin-left: 10px;
    width: 400px;
background:white;
}
div#inquiry-form input.inq-submit { /*inquiry form form submit button*/
    display: block;
    height: 50px;
    margin: 10px;
    width: 200px;
}

div#inquiry-form span.req { /*styles for required fields (name and email feilds)*/
    color: orange;
    font-size: 20px;
}');     
        } 

        ?><div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div> 
        
        <?php }?>
 <!-- Plug in Settings form -->
 
    <form name="inq_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>"> 
         <?php    echo "<h4>" . __( 'Inquiry Form Feild Settings', 'inquiry_for_single' ) . "</h4>"; ?>  
        <input type="hidden" name="inq_hidden" value="Y">  
        
        <p><?php _e("Form Header: " ); ?><input type="text" name="inq_header" value="<?php if(get_option('inq_header')){ echo get_option('inq_header'); }else{ echo 'Inquiry Form for this Post';}?>" /><?php _e(" (Inquiry Form Header Title)" ); ?></p> 
         <p><?php _e("Item Lable: " ); ?><input type="text" name="inq_item_lable" value="<?php if(get_option('inq_item_lable')){ echo get_option('inq_item_lable'); }else{ echo 'Item Name';}?>"/><?php _e("   (Lable of the Post Item. ex:Product,Service etc.)" ); ?></p>  
        <p><?php _e("Email Feild Lable: " ); ?><input type="text" name="inq_email_feild_lable" value="<?php if(get_option('inq_email_feild_lable')){ echo get_option('inq_email_feild_lable'); }else{ echo 'Your Email';}?>"/><?php _e("   (Lable of the Email Feild)" ); ?></p>  
        <p><?php _e("Your Name Feild Lable: " ); ?><input type="text" name="inq_name_feild_lable" value="<?php if(get_option('inq_name_feild_lable')){ echo get_option('inq_name_feild_lable'); }else{ echo 'Your Name';}?>"/> <?php _e("  (Lable of the Name Feild)" ); ?></p>  
        <p><?php _e("Inquiry Message Feild Lable: " ); ?><input type="text" name="inq_message_feild_lable" value="<?php if(get_option('inq_message_feild_lable')){ echo get_option('inq_message_feild_lable'); }else{ echo 'Your Inquiry Message';}?>" /><?php _e("  (Lable of the Inquiry Message Feild)" ); ?></p>  
        <hr /> 
        
         <?php    echo "<h4>" . __( 'Inquiry Email Settings', 'inquiry_for_single' ) . "</h4>"; ?>  
        <p><?php _e("Email to: " ); ?><input type="text" name="inq_email_to" value="<?php if(get_option('inq_email_to')){ echo get_option('inq_email_to'); }else{ echo get_settings('admin_email');}?>" /><?php _e("  (This email will be the inquiry receiver's email. if it was left as a blank. receiver's email will be set as the site admin's email address)" ); ?></p>  
         <hr /> 
        <?php    echo "<h4>" . __( 'Inquiry Form Notifications and Error Messages Settings', 'inquiry_for_single' ) . "</h4>"; ?>  
        <p><?php _e("Inquiry Successful Message: " ); ?><input type="text" name="inq_suc_msg" value="<?php if(get_option('inq_suc_msg')){ echo get_option('inq_suc_msg'); }else{ echo 'Thank you for your Inquiry. We will contact you shortly to answer your questions.';}?>"/></p>  
         <p><?php _e("Wrong Captcha Message: " ); ?><input type="text" name="inq_err_captcha" value="<?php if(get_option('inq_err_captcha')){ echo get_option('inq_err_captcha'); }else{ echo 'Error: please fill the correct value.';}?>"/></p>
         <p><?php _e("Invalid Email Message: " ); ?><input type="text" name="inq_err_email" value="<?php if(get_option('inq_err_email')){ echo get_option('inq_err_email'); }else{ echo 'Error: please enter a valid email address.';}?>"/></p>
         <p><?php _e("Empty Name Feild Message: " ); ?><input type="text" name="inq_err_name" value="<?php if(get_option('inq_err_name')){ echo get_option('inq_err_name'); }else{ echo 'Error: please enter your name.';}?>"/></p>
        <hr /> 
         <?php    echo "<h4>" . __( 'Your Custom Styles for Inquiry form', 'inquiry_for_single' ) . "</h4>"; ?>  
         
         <p><?php _e("Your Styles: " ); ?>
             <textarea name="inq_form_style">

                <?php if(get_option('inq_form_style')){ echo get_option('inq_form_style'); }else
                    
                    { echo '
div#inquiry-form{ /*inquiry form wrapper div*/
padding:10px;
}
div#inquiry-form label { /*inquiry form form lables */
    display: block;
    font-size: 13px;
    font-weight: bold;
    margin: 5px 10px;
}
div#inquiry-form input.inq-text { /*inquiry form form text inputs*/
    display: block;
    height: 35px;
    margin: 0 10px 10px;
    width: 400px;
background:white;
}
div#inquiry-form textarea { /*inquiry form form textareas*/
    height: 140px;
    margin-left: 10px;
    width: 400px;
background:white;
}
div#inquiry-form input.inq-submit { /*inquiry form form submit button*/
    display: block;
    height: 50px;
    margin: 10px;
    width: 200px;
}

div#inquiry-form span.req { /*styles for required fields (name and email feilds)*/
    color: orange;
    font-size: 20px;
}';}?>
             </textarea>
             
        
         <p class="submit">  
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'inquiry_for_single' ) ?>" />  
        </p> 
        
         
    </form>  
 
 <div id="mclanka">
     Powered by <a href="http://www.mclanka.com" target="_blank">Web Design Sri Lanka<img src="http://www.mclanka.com/images/logo.png" alt="Web Design Srilanka Logo"/></a>
     
 </div>
     
</div> 