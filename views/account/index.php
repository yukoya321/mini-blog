<?php $this->setLayoutVar('title', 'アカウント')?>

<h2>アカウント</h2>

<p>ユーザID:<a href="<?php echo $base_url; ?>/user/<?php echo $this->escape($user['user_name']); ?>"><b><?php echo $this->escape($user['user_name']); ?></b></a></p>
<form action="<?php echo $base_url;?>/account/authenticate" method="post">
  <input type="hidden" name="_token" value="<?php $this->escape($_token); ?>">

  <?php if(isset($errors) && count($errors) > 0):?>
    <?php echo $this->render('errors', array('errors' => $errors));?>
  <?php endif;?>

  <?php echo $this->render('account/inputs', array(
    'user_name' => $user_name, 'password' => $password,
  ));?>

  <p><input type="submit" value="ログイン"></p>
</form>
