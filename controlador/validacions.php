<?php

function validar_dni($dni) {
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);
    $letras_validas = "TRWAGMYFPDXBNJZSQVHLCKE";
    $posicion_letra = $numeros % 23;
    $letra_correcta = substr($letras_validas, $posicion_letra, 1);
    return strtoupper($letra) === $letra_correcta;
}

function validar_correo($correo) {
    return filter_var($correo, FILTER_VALIDATE_EMAIL) !== false;
}

function validar_nombre($nombre) {
    return preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $nombre) === 1;
}

function validar_contraseña($contraseña, $contraseña_verificacion) {
    return $contraseña === $contraseña_verificacion;
}


?>