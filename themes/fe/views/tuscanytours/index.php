<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
?>

<body id="archive" class="archive author author-crob author-1">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
    <div class="container marT30">
      <article class="col span_9 first">
        <div class="post-173 page type-page status-publish hentry col span_11 first">
          <p><img class="alignnone size-full wp-image-476" alt="slide-1" src="http://wp.contempographicdesign.com/wp_real_estate_6/wp-content/uploads/2012/08/slide-1.jpg" width="1060" height="420"></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sem quam, scelerisque nec volutpat at, adipiscing eget orci. Cras sed magna velit, quis porttitor metus. Aenean vulputate viverra ultricies. Praesent et tempus lacus. Donec ultricies, purus ac cursus rhoncus, lorem massa consequat est, ac lobortis elit dolor vitae lacus. Vestibulum eget nisi nec orci vestibulum consequat sit amet eu sem. Etiam ac magna vel nibh accumsan feugiat id nec velit. Suspendisse potenti. Aliquam gravida elit ut metus scelerisque vel mollis risus ornare. Vivamus lectus odio, lobortis quis semper lobortis, bibendum porttitor dui. Nam nec sodales sapien. Nunc posuere tempus sem et elementum. Pellentesque feugiat rutrum ligula et rhoncus. Sed quis sem augue, ac volutpat tortor. Cras posuere, arcu in sagittis ornare, ante ipsum hendrerit est, sed rutrum augue lorem sed nunc.</p>
          <p>Quisque euismod augue ac dolor laoreet pretium interdum ligula sollicitudin. Phasellus vitae tortor eu nunc aliquam vulputate eget in mi. Suspendisse sit amet felis nunc, nec lobortis tellus. Cras est nisl, dapibus sed condimentum sit amet, blandit sit amet ligula. Quisque eget dolor et sapien commodo mollis quis sit amet tortor. Proin consequat dui vulputate nulla ullamcorper imperdiet. Ut egestas auctor dapibus. Nunc ut enim lacus. Cras rhoncus dolor semper tortor sollicitudin commodo. Maecenas porta tellus at urna pellentesque ornare. Mauris malesuada consequat tortor. Phasellus nibh arcu, luctus tristique posuere sit amet, vestibulum sed magna. Ut convallis neque id magna commodo semper. In placerat feugiat est at consequat. Etiam rhoncus ultricies luctus.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sem quam, scelerisque nec volutpat at, adipiscing eget orci. Cras sed magna velit, quis porttitor metus. Aenean vulputate viverra ultricies. Praesent et tempus lacus. Donec ultricies, purus ac cursus rhoncus, lorem massa consequat est, ac lobortis elit dolor vitae lacus. Vestibulum eget nisi nec orci vestibulum consequat sit amet eu sem. Etiam ac magna vel nibh accumsan feugiat id nec velit. Suspendisse potenti. Aliquam gravida elit ut metus scelerisque vel mollis risus ornare. Vivamus lectus odio, lobortis quis semper lobortis, bibendum porttitor dui. Nam nec sodales sapien. Nunc posuere tempus sem et elementum. Pellentesque feugiat rutrum ligula et rhoncus. Sed quis sem augue, ac volutpat tortor. Cras posuere, arcu in sagittis ornare, ante ipsum hendrerit est, sed rutrum augue lorem sed nunc.</p>
          <p>Quisque euismod augue ac dolor laoreet pretium interdum ligula sollicitudin. Phasellus vitae tortor eu nunc aliquam vulputate eget in mi. Suspendisse sit amet felis nunc, nec lobortis tellus. Cras est nisl, dapibus sed condimentum sit amet, blandit sit amet ligula. Quisque eget dolor et sapien commodo mollis quis sit amet tortor. Proin consequat dui vulputate nulla ullamcorper imperdiet. Ut egestas auctor dapibus. Nunc ut enim lacus. Cras rhoncus dolor semper tortor sollicitudin commodo. Maecenas porta tellus at urna pellentesque ornare. Mauris malesuada consequat tortor. Phasellus nibh arcu, luctus tristique posuere sit amet, vestibulum sed magna. Ut convallis neque id magna commodo semper. In placerat feugiat est at consequat. Etiam rhoncus ultricies luctus.</p>
          <div class="clear"></div>
        </div>
      </article>
      <?php $this->renderPartial('//layouts/latest-right-side-pane',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
  
</div>
</body>
