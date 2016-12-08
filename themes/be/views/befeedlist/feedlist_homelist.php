<?php 
$this->pageTitle=t('Manage Feed Partners');
$this->pageHint=t('Here you can manage all Feed Partners'); 

?>


<?php $this->widget('cmswidgets.feedlist.Feedlist_homelist_widget'); ?>

<?php 
/*if ($fpartner == 12 ) {

$hl_url = 'https://agentapi.holidaylettings.co.uk/service_avail.aspx';
$xml = Yii::app()->curl->get($hl_url, array('act'=>'homelist','owner_id'=>'188433','secret'=>'FOMBCTIDFB1U2A420SC5FX9XPZPAW2'));

$doc = new DOMDocument();
$doc->loadXML($xml);

$homes = $doc->getElementsByTagName("home");

  foreach( $homes as $home )
  {
  
  $home_id = $home->getElementsByTagName("home_id")->item(0)->nodeValue;
  $prop_id = $home->getElementsByTagName("thirdpartyref")->item(0)->nodeValue;
  $act_yn =  $home->getElementsByTagName("active_yn")->item(0)->nodeValue;
  $home_name =  $home->getElementsByTagName("hom_homename")->item(0)->nodeValue;
  
  $Pinfo = Pinfo::model()->findByPk($home->getElementsByTagName("thirdpartyref")->item(0)->nodeValue);
  
  if($Pinfo) { 
  
  	$Tref = Thirdpartyref::model()->find(array(
			'condition'=>'prop_id = :PID AND third_id = :TID AND feed_id = 12',
			'params'=>array(':PID'=>$prop_id, ':TID'=>$home_id)
	));
	
	
   if($Tref) { 
   
   		$Tref->status = $act_yn; $Tref->name = $home_name; $Tref->save(); 
		echo $home_name.' => '.$act_yn.'<br>';
   
   } else { 
   
   		$Tref_new = new Thirdpartyref;
		
		$Tref_new->prop_id = $prop_id;
		$Tref_new->third_id = $home_id;
		$Tref_new->name = $home_name;
		$Tref_new->feed_id = '12';
		$Tref_new->status = $act_yn;
		
		$Tref_new->cr_ip = ip();
		$Tref_new->crby = Yii::app()->user->getId();
		$Tref_new->created = time();
		$Tref_new->save();
		
		echo $prop_id.' => '. $home_id.'<br>';
   } 
   
  }
  }
  }*/
?>