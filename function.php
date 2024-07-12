<?php
// Fungsi untuk mengenkripsi nilai menggunakan AES-192-CBC dan meng-encode hasilnya dengan base64
function encryptValueAES192($value, $secret_key) {
    // Membuat IV secara acak Baris ini membuat IV (Initialization Vector) acak dengan panjang yang sesuai untuk cipher AES-192-CBC.
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-192-cbc'));
    // Padding nilai agar panjangnya menjadi kelipatan dari ukuran blok (16 byte) 
    //Padding ditambahkan dengan karakter yang merepresentasikan panjang padding.
    $padLength = 16 - (strlen($value) % 16);
    $value .= str_repeat(chr($padLength), $padLength);
    // Baris ini mengenkripsi nilai yang telah dipad dengan menggunakan algoritma AES-192-CBC, 
    //kunci rahasia, dan IV yang telah dihasilkan. Hasilnya adalah data terenkripsi.
    $encrypted = openssl_encrypt($value, 'aes-192-cbc', $secret_key, OPENSSL_RAW_DATA, $iv);
    // Baris ini menggabungkan IV dengan data terenkripsi, lalu meng-encode hasilnya 
    //dengan base64 untuk memastikan data dapat ditransmisikan dengan aman dalam format teks.
    return base64_encode($iv . $encrypted);
}

// Fungsi untuk mendekripsi nilai yang dienkripsi menggunakan AES-192-CBC dan di-encode dengan base64
function decryptValueAES192($encryptedValue, $secret_key) {
    // Baris ini mendecode nilai terenkripsi dari base64 kembali ke format biner asli.
    $value = base64_decode($encryptedValue);
    // Tiga baris ini memisahkan IV dan data terenkripsi. ivLength adalah panjang IV yang sesuai untuk 
    //cipher AES-192-CBC. IV diekstraksi dari bagian awal nilai yang telah didecode, dan sisanya adalah data terenkripsi.
    $ivLength = openssl_cipher_iv_length('aes-192-cbc');
    $iv = substr($value, 0, $ivLength);
    $encrypted = substr($value, $ivLength);
    // Baris ini mendekripsi data terenkripsi menggunakan algoritma AES-192-CBC, kunci rahasia, dan IV yang telah diekstraksi.
    $decrypted = openssl_decrypt($encrypted, 'aes-192-cbc', $secret_key, OPENSSL_RAW_DATA, $iv);
    // Dua baris ini menghapus padding yang ditambahkan selama proses enkripsi. padLength adalah panjang padding yang diambil 
    //dari karakter terakhir data yang didekripsi. Data asli kemudian diekstraksi dengan menghapus padding ini.
    $padLength = ord($decrypted[strlen($decrypted) - 1]);
    return substr($decrypted, 0, -$padLength);
}
?>
