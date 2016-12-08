<div id="detail_error_div"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left:10px;">
  <tr>
    <td width="20%"><strong>From</strong></td>
    <td width="20%"><strong>To</strong></td>
    <td width="15%"><strong>No.of People*</strong></td>
    <td width="15%"><strong>Price/Week</strong></td>
    <td width="15%"><strong>Price/Night</strong></td>
    <td width="15%">&nbsp;</td>
  </tr>
  <tr>
    <td>
	
	<input type="date" name="from_date" id="from_date" value="" class="span2" placeholder="dd-mm-yyyy" />
	</td>
    <td><input type="date" name="to_date" id="to_date" value="" class="span2"  placeholder="dd-mm-yyyy" /></td>
    <td><input name="Rate[people]" id="Rate_people" type="text" class="span1"/></td>
    <td><input name="Rate[price_week]" id="Rate_price_week" type="text" class="span1"/></td>
    <td><input name="Rate[price_day]" id="Rate_price_day" type="text" class="span1"/></td>
    <td><button class="btn btn-large" type="button" onclick="save_season_details('<?php  echo Yii::app()->request->baseUrl;?>/beseason/saveseasondetail','<?php $_GET['page_id'];?>','<?php echo $page_id;?>')"><?php echo t('Save'); ?></button></td>
  </tr>
</table>
<!--<input name="sdate_edit_id" id="sdate_edit_id" type="hidden" /> -->
<input name="rate_edit_id" id="rate_edit_id" type="hidden"/> 



<div class="workplace">
<div class="span9">
<div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t("Date & Price");  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid table-sorting">
<?php
    $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$modeld->season_detail($season_id),
    'itemView'=>'cmswidgets.views.season.season_details_admin', 
	'id'=>'season_detail_grid',  
	//'summaryText'=>'',// refers to the partial view named '_post'

));?>
</div>
</div>
</div>
<br /><br /><br />
<script>
function save_season_details(url,prop_id,page_id)
{

	var requiredFields = ['from_date','to_date','Rate_people','Rate_price_week','Rate_price_day'];
	
	var returnValidation = validation(requiredFields);
		if(returnValidation)
		{
		var season_id=jQuery('#season_detail_id').val();
		var from_date=jQuery('#from_date').val();
		var to_date=jQuery('#to_date').val();
		var people=jQuery('#Rate_people').val();
		var price_week=jQuery('#Rate_price_week').val();
		var price_day=jQuery('#Rate_price_day').val();
		var rate_edit_id=jQuery('#rate_edit_id').val();
		var sdate_edit_id=jQuery('#sdate_edit_id').val();
		
		var curl="<?php echo Yii::app()->request->url; ?>";
		var YII_CSRF_TOKEN = $('input[name="YII_CSRF_TOKEN"]').val();
		
		jQuery.post(url,{page_id:page_id,prop_id:prop_id,season_id:season_id,from_date:from_date,to_date:to_date,price_week:price_week,price_day:price_day,people:people,rate_edit_id:rate_edit_id,sdate_edit_id:sdate_edit_id,YII_CSRF_TOKEN:YII_CSRF_TOKEN},function(data2)
		{
		//	alert(data2);
		var result1=data2.split('@@');
		if(result1[0]=='1')
		{
		jQuery("#detail_error_div").html(result1[1]);
	    jQuery('#from_date').val('');
		jQuery('#to_date').val('');
		jQuery('#Rate_people').val('');
		jQuery('#Rate_price_week').val('');
		jQuery('#Rate_price_day').val('');
		jQuery('#rate_edit_id').val('');
		jQuery('#sdate_edit_id').val('');

		jQuery.fn.yiiListView.update('season_detail_grid',{type:'GET',url:curl});
		if(result1[2]>='1'){enableLink();}
		}
		else
		{
		
		jQuery("#detail_error_div").html(result1[1]);
		}
		
		});
		
		
		}

}
	function validation(requiredFields)
	{
	
		var valid = true;
		for(var i = 0; i < requiredFields.length; i++)
		{ 
			if((requiredFields[i]!='Rate_price_week')&&(requiredFields[i]!='Rate_price_day'))
			{
				var val = jQuery('#'+requiredFields[i]).val();
				if (!val) 
				{
	
					jQuery('#'+requiredFields[i]).css('background-color','#F8DBDB');
					valid = false;
	
				  } else
					jQuery('#'+requiredFields[i]).css('background-color','#FFFFFF');
			}
			else
			{
			 if((jQuery('#Rate_price_week').val()!='')||(jQuery('#Rate_price_day').val()!=''))
			 {
			 jQuery('#'+requiredFields[i]).css('background-color','#FFFFFF');
			 }
			 else
			 {
			 		jQuery('#'+requiredFields[i]).css('background-color','#F8DBDB');
					valid = false;

			 }
			 
			}
		}
		return valid;	
	}
	
	
	
function edit_seasondetails(url,rate_id)
{
var YII_CSRF_TOKEN=$('input[name="YII_CSRF_TOKEN"]').val();
 jQuery.post(url, {rate_id: rate_id,YII_CSRF_TOKEN:YII_CSRF_TOKEN}, function(data)
	{
	 var result=data.split('@@');
		var from_date=jQuery('#from_date').val(result[0]);
		var to_date=jQuery('#to_date').val(result[1]);
		var people=jQuery('#Rate_people').val(result[2]);
		var price_week=jQuery('#Rate_price_week').val(result[3]);
		var price_day=jQuery('#Rate_price_day').val(result[4]);
		var price_day=jQuery('#rate_edit_id').val(result[5]);
		//var price_day=jQuery('#sdate_edit_id').val(result[6]);
			
			//jQuery.fn.yiiListView.update('prof_comment_view',{type:'GET',url:curl});
	});
}
function del_seasondetails(url,rate_id,prop_id)
{
var curl="<?php echo Yii::app()->request->url; ?>";
var YII_CSRF_TOKEN=$('input[name="YII_CSRF_TOKEN"]').val();
if( confirm('Are you sure you want to delete this Item?') )
{

jQuery.post(url, {prop_id:prop_id,rate_id:rate_id,YII_CSRF_TOKEN:YII_CSRF_TOKEN}, function(data)
		{
		//alert(data);
       jQuery.fn.yiiListView.update('season_detail_grid',{type:'GET',url:curl});
	    if(data==0){disableLink();}
          });
}
}
	jQuery(function($) {
jQuery('#season_detail_grid').yiiListView({'ajaxUpdate':['season_detail_grid'],'ajaxVar':'ajax','pagerClass':'pager','loadingClass':'list-view-loading','sorterClass':'sorter','enableHistory':false});
});
</script>