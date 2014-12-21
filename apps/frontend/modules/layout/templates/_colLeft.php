<?php include_partial('auction/last', array('auctions' => $auctions)); ?>

<script>
$(function() {
setInterval(function() {
      updateLastAuctions(true);
	}, 25000);
});
</script>