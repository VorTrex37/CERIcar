<script type="text/javascript">
    afficheAlert("<?php echo $context->status ?>", "<?php echo $context->message ?>")
    redirect($_SESSION['id']  ? $_SESSION['id']  : null)
</script>
