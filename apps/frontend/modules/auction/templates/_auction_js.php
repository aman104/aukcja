<script type="text/javascript">

function closeAuction<?php echo $auction->getPrimaryKey() ?>()
{
	window.location = window.location;
}

$(".<?php echo $classCountDown; ?>").kkcountdown({
 dayText : ' <?php echo __("dzień"); ?> ',
 daysText : ' <?php echo __("dni"); ?> ',
 hoursText : ':',
 minutesText : ':',
 secondsText : '',
 displayZeroDays : false,
 oneDayClass : 'one-day',
 callback: closeAuction<?php echo $auction->getPrimaryKey() ?>
 });
</script>