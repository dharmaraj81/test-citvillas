<footer>

    <div class="container">

      <nav class="left">

        <div id="footer-nav" class="menu-footer-container">

          <ul id="menu-footer" class="menu">

            <li id="menu-item-560" class="menu-item menu-item-type-custom"><a href="/">Home</a></li>

            <li id="menu-item-561" class="menu-item menu-item-type-taxonomy"><a href="http://blog.citvillas.com/">Blog</a></li>

           

            

             <?php

				  $menu1 = Page::GetPageNameByGuidWithLang('5193958c0408a');		

				  if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>

              <li id="menu-item-562" class="menu-item menu-item-type-custom"><a href="<?php echo $this->createUrl('testimonial/index'); ?>"><?php echo $seo->mainmenu; ?></a></li>

              <?php } ?>

           <!-- <li id="menu-item-562" class="menu-item menu-item-type-custom"><a href="#">Find a Home</a></li> -->

          </ul>

        </div>

      </nav>

      <p class="marB0 right">© 2015 Ciao Italy Villas, All Rights Reserved. <a id="back-to-top" href="#top">Back to top </a></p>

      <div class="clear"></div>

    </div>

  </footer>
