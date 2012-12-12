<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
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
        
            <section id="top-contact">
              <a target="_blank" href="http://goo.gl/maps/3zeka"><span class="icon" aria-hidden="true" data-icon="a"></span> <span class="data">1037 Budapest, Bécsi út 81.</span></a>
              <a href="tel:+36706348889"><span class="icon" aria-hidden="true" data-icon="t"></span> <span class="data">+36 70 634-8889</span></a>
              <a href="mailto:info@7merfold.hu"><span class="icon" aria-hidden="true" data-icon="e"></span> <span class="data">info@7merfold.com</span></a>
              <a target="_blank" href="https://www.facebook.com/7MerfoldUtazasiIroda"><span class="icon" aria-hidden="true" data-icon="f"></span><span class="data">Likeolj minket!</span></a>
              <a href="#"><span class="icon" aria-hidden="true" data-icon="n"></span><span class="data">Iratkozz fel hírlevelünkre!</span></a>
            </section>

            <header id="main-header" class="clearfix">
                  <div class="clearfix">
                    <a href="<?php echo $this->webroot; ?>" id="logo">
                    <?php echo $this->Html->image('logo.png', array('alt' => '7mérföld Utazási Iroda')); ?>
                  </a>
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
        
          <footer id="main-footer">
            <div id="contact">
              <a target="_blank" href="http://goo.gl/maps/3zeka"><span class="icon" aria-hidden="true" data-icon="a"></span> <span class="data">1037 Budapest, Bécsi út 81.</span></a>
              <a href="tel:+36706348889"><span class="icon" aria-hidden="true" data-icon="t"></span> <span class="data">+36 70 634-8889</span></a>
              <a href="mailto:info@7merfold.hu"><span class="icon" aria-hidden="true" data-icon="e"></span> <span class="data">info@7merfold.com</span></a>
              <a target="_blank" href="https://www.facebook.com/7MerfoldUtazasiIroda"><span class="icon" aria-hidden="true" data-icon="f"></span><span class="data">Likeolj minket!</span></a>
              <a href="#"><span class="icon" aria-hidden="true" data-icon="n"></span><span class="data">Iratkozz fel hírlevelünkre!</span></a>
            </div>
            <a href="#" class="totop"><span aria-hidden="true" data-icon="u"></span>Oldal tetejére</a>
            <p>
              <a href="#">hajozz.eu</a> | <a href="#">felfedezoutak.hu</a> | <a href="#">utazási feltételek</a> | <a href="#">állás</a>
            </p>
            <p>&copy; 7mérföld Utazási Iroda 2012</p>
          </footer>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
        <?php echo $this->Html->script(array('jpanel','carousel','main')); ?>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
