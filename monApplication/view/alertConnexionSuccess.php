<script type="text/javascript">
    afficheAlert("<?php echo $context->status ?>", "<?php echo $context->message ?>")
    if (<?php echo $_SESSION['id'] ?>) {
        setTimeout(window.location.replace("monApplication.php"), 5000);
    }
</script>
