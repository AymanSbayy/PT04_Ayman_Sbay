<?php


function validar_dni2($dni) {
    return preg_match('/^[0-9]{8}[A-Z]$/', $dni) !== 1;
}


function validar_email($correo) {
    return filter_var($correo, FILTER_VALIDATE_EMAIL) !== false;
}

function validar_nombre($nombre) {
    return preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $nombre) !== 1;
}


function validar_contraseña2($contraseña) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}$/', $contraseña) !== 1;
}

function validar_contraseña($contraseña, $contraseña_verificacion) {
    return $contraseña === $contraseña_verificacion;
}


?>