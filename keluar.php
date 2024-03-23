<?php
    session_start();
    $_SESSION['ex']="Anda yakin ingin logout?";
?>
<script>
    window.history.back();
</script>