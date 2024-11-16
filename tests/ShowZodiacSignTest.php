<?php
use PHPUnit\Framework\TestCase;

class ShowZodiacSignTest extends TestCase
{
    public function testMostrarSignoValido()
    {
        $_POST['data_nascimento'] = '2024-03-25'; // Data válida para Áries

        // Incluir o arquivo show_zodiac_sign.php para rodar o código
        ob_start();
        include 'show_zodiac_sign.php';
        $output = ob_get_clean();

        // Verifique se o signo correto é exibido
        $this->assertStringContainsString('Seu signo é: Áries', $output);
    }

    public function testMostrarSignoInvalido()
    {
        $_POST['data_nascimento'] = '2024-02-30'; // Data inválida

        // Incluir o arquivo show_zodiac_sign.php para rodar o código
        ob_start();
        include 'show_zodiac_sign.php';
        $output = ob_get_clean();

        // Verifique se a mensagem de erro é exibida
        $this->assertStringContainsString('Data inválida! Não foi possível encontrar um signo correspondente.', $output);
    }
}
