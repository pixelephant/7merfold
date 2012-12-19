<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $page_title ?> | 7Mérföld Utazási Iroda</title>
        <meta name="description" content="">
        <meta name="keywords" content="<?php echo $page_keywords ?>">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,200italic,400italic,600italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gentium+Basic:400,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

        <?php echo $this->fetch('css'); ?>
        <?php echo $this->Html->css(array('main')); ?>
        <?php echo $this->Html->script(array('vendor/modernizr-2.6.2.min')); ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

            <header id="main-header" class="clearfix no-flick">
                  <div class="clearfix">
                    <a href="<?php echo $this->webroot; ?>" id="logo">
                      <?php echo $this->Html->image('logo.png', array('alt' => '7mérföld Utazási Iroda')); ?>
                    </a>
                    <section id="top-contact">
                      <a target="_blank" href="http://goo.gl/maps/3zeka"><span class="icon" aria-hidden="true" data-icon="a"></span> <span class="data">1037 Bp, Bécsi út 81.</span></a>
                      <a href="tel:+36706348889"><span class="icon" aria-hidden="true" data-icon="t"></span> <span class="data">+36 70 634-8889</span></a>
                       <a href="tel:+3612401978"><span class="icon" aria-hidden="true" data-icon="t"></span> <span class="data">+36 1 240-1978</span></a>
                        <a target="_blank" href="https://www.facebook.com/7MerfoldUtazasiIroda"><span class="icon" aria-hidden="true" data-icon="f"></span><span class="data">Likeolj minket!</span></a>
              <a href="http://eepurl.com/s8v4D"><span class="icon" aria-hidden="true" data-icon="n"></span><span class="data">7Mérföld hírlevél</span></a>
                      <a href="mailto:info@7merfold.hu"><span class="icon" aria-hidden="true" data-icon="e"></span> <span class="data">info@7merfold.com</span></a>
                     <!-- <a target="_blank" href="https://www.facebook.com/7MerfoldUtazasiIroda"><span class="icon" aria-hidden="true" data-icon="f"></span><span class="data">Likeolj minket!</span></a>
                      <a href="#"><span class="icon" aria-hidden="true" data-icon="n"></span><span class="data">Iratkozz fel hírlevelünkre!</span></a> -->
                    </section>
                  <nav id="mobile-nav">
                      <ul class="clearfix">
                          <li><a id="contact-trigger" href="#contact">
                          <span aria-hidden="true" data-icon="c"></span>
                          Kapcsolat</a></li>
                          <li><a id="search-trigger" href="#">
                          <span aria-hidden="true" data-icon="s"></span>
                          Keresés</a></li>
                          <li><a id="sub-trigger" href="#">
                          <span aria-hidden="true" data-icon="m"></span>
                          Menü</a></li>
                      </ul>
                  </nav>
                <div id="search-form" class="clearfix">
                  <form method="get" action="<?php echo $this->webroot ?>kereses">
                    <input type="search" name="search" id="search" placeholder="Keresés..." required>
                    <input type="submit" value="Ok">
                  </form>
                </div>
                  </div>
                <nav id="mobile-submenu">
                    <h2><span>Menü</span><a href="#" class="close">&times;</a></h2>
                    <?php echo $this->element('top_menu_dynamic'); ?>
                </nav>
            </header>
            <?php echo $this->element('breadcrumb', array('breadcrumb' => $breadcrumb)); ?>
            <div id="main-content">
                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="sidebar">
              <?php echo $this->element('quote_box'); ?>
              <section class="section" id="side-share">
                <div class="cont" syle="overflow:hidden;">
                  <span class="shares"><span>Megosztás</span><a href="mailto:info@7merfold.com?body=szuper&subject=7merfold"><span class="icon" aria-hidden="true" data-icon="e"></span></a><a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $this->Html->url( null, true ); ?>"><?php echo $this->Html->image('f_logo.png'); ?></a></span>
                </div>
              </section>
            </div>
          <footer id="main-footer">
            <div id="contact">
              <a target="_blank" href="http://goo.gl/maps/3zeka"><span class="icon" aria-hidden="true" data-icon="a"></span> <span class="data">1037 Budapest, Bécsi út 81.</span></a>
              <a href="tel:+36706348889"><span class="icon" aria-hidden="true" data-icon="t"></span> <span class="data">+36 70 634-8889</span></a>
              <a href="tel:+3612401978"><span class="icon" aria-hidden="true" data-icon="t"></span> <span class="data">+36 1 240-1978</span></a>
              <a href="tel:+3612401978"><span class="icon fax" aria-hidden="true" data-icon="x"></span> <span class="data">+36 1 240-1978</span></a>
              <a href="mailto:info@7merfold.hu"><span class="icon" aria-hidden="true" data-icon="e"></span> <span class="data">info@7merfold.com</span></a>
              <a target="_blank" href="https://www.facebook.com/7MerfoldUtazasiIroda"><span class="icon" aria-hidden="true" data-icon="f"></span><span class="data">Likeolj minket!</span></a>
              <a href="http://eepurl.com/s8v4D"><span class="icon" aria-hidden="true" data-icon="n"></span><span class="data">Iratkozz fel hírlevelünkre!</span></a>
              <a href="#" class="totop"><span class="icon" aria-hidden="true" data-icon="u"></span>Oldal tetejére</a>
            </div>
            <p>
              <a target="_blank" href="http://www.hajozz.eu">hajozz.eu</a> | <a href="http://www.felfedezoutak.hu">felfedezoutak.hu</a> | <a href="http://www.enutazasom.hu">enutazasom.hu</a> | <a href="#">utazási feltételek</a> | <a href="#">állás</a>
            </p>
            <p>7Mérföld Utazási Iroda &copy; 2012 | Eng. szám: U-001052</p>
          </footer>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
        <?php echo $this->Html->script(array('jpanel','main')); ?>
        <?php echo $this->fetch('script'); ?>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
