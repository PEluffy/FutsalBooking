<?php
session_start();
session_destroy();
echo "<script>
window.location.href='../src/index.php';
</script>";
