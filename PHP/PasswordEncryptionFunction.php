<?php
    /**
     * when encrypting password for login process, the right way to do it is using
     * password_hash, (PHP 5 >= 5.5.0, PHP 7)
     * PASSWORD_DEFAULT: Use the bcrypt algorithm (default as of PHP 5.5.0).
     */
    $password = '123456789';
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    // Now you can save it to database
    /**
     * Remeber that this is one way encryption, meaning it "cannot be decrypted"
     * so, for password validation, you need to make a comparison of encrypted passwords
     */
    $db_password = '$2y$10$lpaAC/qIIiIyWmFlTtPqKOW4aHMiqqVFBFA3tP9AdWYCHLspG/hTK';
    $input_password = '123456789';
    $login = password_verify($input_password, $db_password);
