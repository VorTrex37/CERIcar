<?php if ($context->param1 || $context->param2) { ?>
    J’ai compris <?php echo $context->param1 ?> , 
    <br>
    Super : <?php echo $context->param2 ?>
<?php } else { ?>
    <p><?php echo $context->event ?></p>
<?php }?>
