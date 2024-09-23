<?php
class SimpleEncrypt {
    private $clave;
    private $metodo;

    public function __construct($clave) {
        $this->clave = $clave; // Clave secreta
        $this->metodo = 'AES-256-CBC'; // Método de cifrado
    }

    public function encriptar($datos) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->metodo)); // Generar IV
        $encrypted = openssl_encrypt($datos, $this->metodo, $this->clave, 0, $iv);
        return base64_encode($encrypted . '::' . $iv); // Devolver datos encriptados con IV
    }

    public function desencriptar($datos_encriptados) {
        list($encrypted_data, $iv) = explode('::', base64_decode($datos_encriptados), 2); // Separar datos y IV
        return openssl_decrypt($encrypted_data, $this->metodo, $this->clave, 0, $iv);
    }
}

// Ejemplo de uso
$clave_secreta = md5('tapje');

echo $clave_secreta;

$texto = "122";
$encriptador = new SimpleEncrypt($clave_secreta);

836efdd951d0921008954d887a2177c1
bkhLY2lSTnFOK1NIaTUybjZuL1lwdz09Ojq6sDzWtTS2dAdm72RcLE7L


$texto_encriptado = $encriptador->encriptar($texto);
echo "autorizacion: " . $texto_encriptado . "<br>";
?>
