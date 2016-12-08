<?php
if($_GET['view']!='')
{
	switch($_GET['view'])
	{
		case 'features';
				$this->renderPartial('atraveo/features',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
		case 'availprice';
				$this->renderPartial('atraveo/availprice',array('XmlFeed'=>$XmlFeed,'id'=>$id));
				break;
	}
}
?>