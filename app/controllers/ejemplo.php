<?php
function inverse($x) {
   // if (!$x) {
   //     throw new Exception('Division par zéro.');
   // }
    return 1%$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (ErrorException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

// Continue execution
echo "Bonjour le monde !\n";
?>