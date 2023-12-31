<?php

//echo password_hash("brehemaJR67", PASSWORD_BCRYPT, ['cost'=>12]);

function encryptPassword($plaintext) {
    return password_hash($plaintext, PASSWORD_BCRYPT, ['cost'=>12]);
}

function checkPassword($enteredPassword, $hash) {
    return password_verify($enteredPassword, $hash);
}

?>