<?php $this->setLayoutVar('title', 'ホーム'); ?>

<h2>ホーム</h2>

<form action="<?php echo $base_url; ?>/status/post" method="post">
  <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>">
  <?php //something to do ?>

  <textarea name="body" rows="2" cols="60"><?php echo $this->escape($body); ?></textarea>
  <p><input type="submit" value="発言"></p>
</form>

<dib id="statuses">
  <?php foreach ($statuses as $status):?>
    <?php echo $this->render('status/status', array('status' => $status)); ?>
    </div>
  <?php endforeach;?>
</dib>
