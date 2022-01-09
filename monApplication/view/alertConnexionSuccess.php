<?php if (empty($_SESSION['id'])) {
    $_SESSION['id'] = null;
} ?>

<script type="text/javascript">
    afficheAlert("<?php echo $context->status ?>", "<?php echo $context->message ?>")
    redirect("<?php echo $_SESSION['id'] ?>")
</script>
