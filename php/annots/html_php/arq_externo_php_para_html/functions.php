<?php 

Function frutas() {
    $arrFrut = ["banana", "laranja", "maca"];

    foreach ( $arrFrut as $key => $value) {
        echo "<option value='$key'>$value</option>";
    }
}


// não é obrigatiorio fechar - ? > - se for um arquivo apenas de php 