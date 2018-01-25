<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="var_dump" style="margin: auto; display: table">

<?php foreach ($data as $key => $value): ?>
    <?php if (!empty($value) && isset($value)): ?>
        <h4><?php echo mb_strtoupper(mb_substr($key, 0, 1)).mb_substr($key, 1)?></h4>
        <pre>
        <?php print_r($value)?>
        </pre>
    <?php endif ?>
<?php endforeach ?>

</div>
