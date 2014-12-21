<?php $url = isset($url) ? $url : url_for('@auctions'); ?>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">

    <ul>
  
      <li><a href="<?php echo $url ?>?page=<?php echo $pager->getPreviousPage() ?>">&laquo;</a></li>
  
      <?php foreach ($pager->getLinks() as $page): ?>
        <li )
        <?php if ($page == $pager->getPage()): ?>
          class="disabled"
        <?php endif; ?>
        >
        <a href="<?php echo $url ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
        </li>        
      <?php endforeach; ?>
  
      <li><a href="<?php echo $url ?>?page=<?php echo $pager->getLastPage() ?>">&raquo;</a></li>
  
    </ul>        

  </div>
<?php endif; ?>