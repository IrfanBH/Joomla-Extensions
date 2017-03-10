<?php
defined('_JEXEC') or die;
?>
<!-- Title -->
<div class="row padded-top">
	<div class="col-xs-12 col-lg-8 col-lg-offset-2">
		<h2><?php echo $module->title;?></h2>
	</div>
</div>

<!-- Form -->
<div class="row padded-bottom">
	<div class="col-xs-12 col-lg-8 col-lg-offset-2">
		<h1><a href="<?php echo $params->get('admin_email');?>"><?php echo $params->get('admin_email');?></a></h1>
		<p><?php echo $params->get('sub_heading');?></p>

		<form id="contact" name="contact" action="<?php echo JURI::base();?>#mailSend" method="post">
			<input type="hidden" name="contact_us" value="1">
			<fieldset>
				<?php 
				$userEmail = '';
				$mailBody = '';
				foreach ($objects as $key => $value) {
					if( $value['field_type'] == 'email'){
						$userEmail = strtolower(str_replace(" ", "_",$value['field_title']));
					}
					if( $value['field_type'] == 'submit'){
						$mailBody .= '<input id="submit" type="submit" name="'.strtolower(str_replace(" ", "_",$value['field_title'])).'" value="'.$value['field_title'].'">';
					}else if($value['field_type'] == 'textarea'){
						$mailBody .='<label for="'.strtolower(str_replace(" ", "_",$value['field_title'])).'">'.$value['field_title'].'</label><textarea name="'.strtolower(str_replace(" ", "_",$value['field_title'])).'"  id="'.strtolower(str_replace(" ", "_",$value['field_title'])).'"'.$requiredField.'>'.@$_POST[strtolower(str_replace(" ", "_",$value['field_title']))].'</textarea>';
					}else{
							$requiredField = '';
							if($value['field_required']==1){ 
								$requiredField= "required=required";
							}
						$mailBody .= '<label for="'.strtolower(str_replace(" ", "_",$value['field_title'])).'">'.$value['field_title'].'</label>
						<input value="'.@$_POST[strtolower(str_replace(" ", "_",$value['field_title']))].'" type="'.$value['field_type'].'" name="'.strtolower(str_replace(" ", "_",$value['field_title'])).'" id="'.strtolower(str_replace(" ", "_",$value['field_title'])).'"'.$requiredField.'/>';
					}
				}

				if($userEmail == ''){
				echo "<h2 style='color:red'>Please add at least one email filed on <a href='".JURI::base()."administrator/index.php?option=com_persona_contact'>Administrator</a></h2>";
				}else{
					echo $mailBody;
				}?>
			</fieldset>
		</form>

		<?php
		$error=0;
		if(isset($_POST['contact_us'])){
			foreach ($objects as $key => $value) {
				if( $value['field_type'] != 'submit'){
					if($value['field_required']=='1' && $_POST[strtolower(str_replace(" ", "_",$value['field_title']))]==''){
						$error = 1;
					}
				}
			}

    $plainText =  $params->get('email_templete');
    if($plainText!=''){
    	foreach ($objects as $key => $value) {
	    	$plainText = str_replace('['.$value["field_title"].']', $_POST[strtolower(str_replace(" ", "_",$value['field_title']))], $plainText);
    	}
    }else{
    	$plainText = "Here is what was sent:\n\n";
    	foreach ($objects as $key => $value) {
    		$plainText .= $_POST[strtolower(str_replace(" ", "_",$value['field_title']))]."\n\n";
    	}
    }
    $mailer = JFactory::getMailer();
    $config = JFactory::getConfig();
	$sender = array( 
	    $config->get( $params->get('from_email') ),
	    $config->get( $params->get('from_name') ) 
	);
	 
	$mailer->setSender($sender);
	if($params->get('send_user')==1){
		$mailer->addRecipient(array($params->get('admin_email'),$_POST[$userEmail]));
	}else{
		$mailer->addRecipient($params->get('admin_email'));
	}
	
	$mailer->isHTML(true);
	$mailer->Encoding = 'base64';
	$mailer->setSubject($config->get( 'sitename' ).' - '.$module->title);
	$mailer->setBody($plainText);
	$send = $mailer->Send();
	if ( $send !== true ) {?>
	<div id="mailSend">
	    <div id="error">
			<p>Something went wrong, try refreshing and submitting the form again.</p>
		</div>
		</div>
	<?php } else {?>
	<div id="mailSend">
	    <div id="success">
			<p>Your message was sent successfully! I will be in touch as soon as I can.</p>
		</div>
		</div>
	<?php }
	}

?>
</div>
</div>
