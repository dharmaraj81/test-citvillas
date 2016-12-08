<div class="row-fluid">
  <div class="span12">
    <div class="widgetButtons">
      <div class="bb" grey> <a href="<?php echo Yii::app()->createUrl('crmleads/admin');?>"><span class="ibb-users"></span></a>
        <div class="caption red">31</div>
      </div>
      <div class="bb green"> <a href="<?php echo Yii::app()->createUrl('crm/mails');?>"><span class="ibw-mail"></span></a>
        <div class="caption yellow">87</div>
      </div>
      <div class="bb red"> <a href="<?php echo Yii::app()->createUrl('crmshedules/admin');?>"><span class="ibw-time"></span></a>
        <div class="caption">23</div>
      </div>
      <div class="bb yellow"> <a href="#"><span class="ibw-plus"></span></a>
        <div class="caption green">14</div>
      </div>
      <div class="bb red"> <a href="#"><span class="ibw-favorite"></span></a>
        <div class="caption blue">53</div>
      </div>
      <div class="bb green"> <a href="<?php echo Yii::app()->createUrl('crmsettings/admin');?>"><span class="ibw-settings"></span></a>
        <div class="caption gray">51</div>
      </div>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span8">
    <div class="head">
      <div class="isw-mail"></div>
      <h1><?php echo t('Mails'); ?> </h1>
      <ul class="buttons">
        <li> <a href="#" class="isw-settings"></a> </li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="block messages scrollBox">
      <div class="scroll" style="height: 600px;">
        <?php if ( isset($CrmMails) && count($CrmMails)>0 ) { 
						
								foreach ($CrmMails as $CrmMail) { 
						?>
        <div class="item">
          <div class="image"><a href="#"><img src="img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>
          <div class="info"> <a href="#" class="name"><?php echo $CrmMail->crm_subject; ?></a><br />
            <span><?php echo CHtml::encode($CrmMail->crm_from); ?></span>
            <p><?php echo substr( xml_clear($CrmMail->crm_content) ,0,150); ?></p>
            <span><?php echo date('d M Y  H:i:s',$CrmMail->crm_delivery_date_timestamp); ?></span> </div>
          <div class="clear"></div>
        </div>
        <?php } } ?>
      </div>
    </div>
  </div>
</div>


<?php 

//$lists = Yii::app()->mailchimp->lists(); 

//$lists = Yii::app()->mailchimp->listMembers($status = 'subscribed');  89253 11297

//print_r($lists);

//$params = array( 'date'=> date('Y-m-d',time()), 'website'=>'http://www.dharmaraj.me' );	
//$email='vinothini.kj20@yahoo.com';

//$result = Yii::app()->mailchimp->listSubscribe($email, $params, $doubleOptIn = false);
//$result = Yii::app()->mailchimp->listMembers($status = 'subscribed');
//print_r($result);

//listSubscribe(string apikey, string id, string email_address, array merge_vars, string email_type, boolean double_optin, boolean update_existing, boolean replace_interests, boolean send_welcome)

//$result = Yii::app()->mailchimp->listSubscribe(string apikey, string id, string email_address, array merge_vars, string email_type, boolean double_optin, boolean update_existing, boolean replace_interests, boolean send_welcome);
	
?>