<?php
if($_GET['view']!='')
{
	switch($_GET['view'])
	{
		case 'getproperties';
				$this->renderPartial('flipkey/getproperties',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'property';
				if($_GET['viewid']!='')
				$this->renderPartial('flipkey/property',array('id'=>$id,'viewid'=>$_GET['viewid']));
				break;
		case 'getavailability';
				$this->renderPartial('flipkey/getavailability',array('id'=>$id,'viewid'=>$_GET['viewid']));
				break;
		case 'reservations';
				$this->renderPartial('flipkey/reservations',array('id'=>$id,'start_date'=>$_GET['start_date'],'end_date'=>$_GET['end_date']));
				break;
	}
}
?>