<?php
    $action = sfContext::getInstance()->getActionName();
    $module = sfContext::getInstance()->getModuleName();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div class="container">
    
      <?php include_component('layout', 'topMenu'); ?>
      <?php include_component('layout', 'breadcrumbs'); ?>

      <?php echo include_component('layout', 'flash'); ?>

      <?php if($module == 'auction' && $action == 'galleries'): ?>

        <?php echo $sf_content ?>

      <?php else: ?>  

        <?php if($module != 'sale'): ?>
          <div id="lastAuctions">
            <?php echo include_component('layout', 'colLeft'); ?>
          </div>

          <div class="span9" style="border-left: 1px solid #fff; padding-left: 10px;">

            <?php echo $sf_content ?>

          </div>
        <?php else: ?>

            <?php echo $sf_content ?>

        <?php endif; ?>  

      <?php endif; ?>

      <div style="clear: both; text-align: center;">
      <br />


      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- Kulbacki International -->
      <ins class="adsbygoogle"
           style="display:inline-block;width:728px;height:90px"
           data-ad-client="ca-pub-2881583917933170"
           data-ad-slot="5623545647"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script> 

      </div>

      <?php echo include_component('layout', 'footer'); ?>

    </div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pl', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>  

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38449312-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

  </body>
</html>
