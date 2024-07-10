<?php
// Fungsi untuk mengenkripsi nilai menggunakan AES-192-CBC dan meng-encode hasilnya dengan base64
function encryptValueAES192($value, $secret_key) {
    // Membuat IV secara acak
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-192-cbc'));
    // Padding nilai agar panjangnya menjadi kelipatan dari ukuran blok (16 byte)
    $padLength = 16 - (strlen($value) % 16);
    $value .= str_repeat(chr($padLength), $padLength);
    // Mengenkripsi nilai menggunakan AES-192-CBC
    $encrypted = openssl_encrypt($value, 'aes-192-cbc', $secret_key, OPENSSL_RAW_DATA, $iv);
    // Menggabungkan IV dan data yang terenkripsi lalu meng-encode dengan base64
    return base64_encode($iv . $encrypted);
}

// Fungsi untuk mendekripsi nilai yang dienkripsi menggunakan AES-192-CBC dan di-encode dengan base64
function decryptValueAES192($encryptedValue, $secret_key) {
    // Mendecode dari base64
    $value = base64_decode($encryptedValue);
    // Memisahkan IV dan data yang terenkripsi
    $ivLength = openssl_cipher_iv_length('aes-192-cbc');
    $iv = substr($value, 0, $ivLength);
    $encrypted = substr($value, $ivLength);
    // Mendekripsi menggunakan AES-192-CBC
    $decrypted = openssl_decrypt($encrypted, 'aes-192-cbc', $secret_key, OPENSSL_RAW_DATA, $iv);
    // Menghapus padding
    $padLength = ord($decrypted[strlen($decrypted) - 1]);
    return substr($decrypted, 0, -$padLength);
}
?>
