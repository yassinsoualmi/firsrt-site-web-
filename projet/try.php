<?php
// Check if sqlsrv extension is loaded
if (extension_loaded("sqlsrv")) {
    echo "✅ SQLSRV extension is enabled!";
} else {
    echo "❌ SQLSRV extension is NOT enabled!";
}
?>
