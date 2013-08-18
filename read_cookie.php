<?php

    if($_COOKIE['eed']){
        $ciphertext_base64 = $_COOKIE['eed'];

        # --- DECRYPTION ---

        $key = 'eed-importa';

        
        $ciphertext_dec = base64_decode($ciphertext_base64);
        
        # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
        $iv_dec = substr($ciphertext_dec, 0, 16);
        
        # retrieves the cipher text (everything except the $iv_size in the front)
        $ciphertext_dec = substr($ciphertext_dec, 16);

        # may remove 00h valued characters from end of plain text
        $plaintext_utf8_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                             $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
        
        $user_name=$plaintext_utf8_dec; 
    }


?>