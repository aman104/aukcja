<?php use_helper('I18N', 'Date') ?>
<?php include_partial('auction/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Lista wszystkich aukcji', array(), 'messages') ?></h1>

  <?php if($sf_user->getAttribute('is_end') == 'true'): ?>
    <h3><a href="<?php echo url_for('auction').'?is_end=false' ?>">Zobacz aktualne aukcje</a></h3>
  <?php else: ?>
    <h3><a href="<?php echo url_for('auction').'?is_end=true' ?>">Zobacz aukcje zakończone</a></h3>
  <?php endif; ?>


  <?php include_partial('auction/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('auction/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('auction/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('auction_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('auction/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('auction/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('auction/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('auction/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
