<div class="well">

<h1 style="text-align: center;"><?php echo __('Zmień hasło'); ?></h1>

<h4><?php echo __('Wprowadź nowe hasło'); ?></h4>

<form action="<?php echo url_for('@sf_guard_forgot_password_change?unique_key='.$sf_request->getParameter('unique_key')) ?>" method="POST">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot><tr><td><input type="submit" name="change" class="btn btn-primary" value="<?php echo __('Zmień'); ?>" /></td></tr></tfoot>
  </table>
</form>

</div>