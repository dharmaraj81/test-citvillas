<?php
if($_GET['view']!='')
{
	switch($_GET['view'])
	{
		case 'createListing';
				$this->renderPartial('travelmob/create',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'updateListing';
				$this->renderPartial('travelmob/update',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'updateAvailability';
				$this->renderPartial('travelmob/availability',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'updateRates';
				$this->renderPartial('travelmob/rates',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
	}
}
?>