<?php
if($_GET['view']!='')
{
	switch($_GET['view'])
	{
		case 'settings';
				$this->renderPartial('casamundo/settings',array('id'=>$id));
				break;
		case 'seasons';
				$this->renderPartial('casamundo/seasons',array('id'=>$id));
				break;
		case 'availabilties_daily';
				$this->renderPartial('casamundo/availabilties_daily',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'availabilties_weekly';
				$this->renderPartial('casamundo/availabilties_weekly',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'extras';
				$this->renderPartial('casamundo/extras',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'facilities';
				$this->renderPartial('casamundo/facilities',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'lodgings';
				$this->renderPartial('casamundo/lodgings',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'prices_daily';
				$this->renderPartial('casamundo/prices_daily',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'prices_weekly';
				$this->renderPartial('casamundo/prices_weekly',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
	}
}
?>