<form action="<?php echo url_for('@login') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <a class="register-link" href="<?php echo url_for('@register') ?>"><?php echo __('Nie masz konta? Zarejestruj się'); ?> &raquo;</a><br />
          <a class="register-link" href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Nie pamiętasz hasła?'); ?> &raquo;</a>
          
          <input type="submit" class="btn btn-primary pull-right" value="<?php echo __('Zaloguj się'); ?>" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>