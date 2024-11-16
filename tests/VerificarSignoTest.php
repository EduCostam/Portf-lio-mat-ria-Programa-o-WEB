<?php
use PHPUnit\Framework\TestCase;

class VerificarSignoTest extends TestCase
{
    public function testVerificarSigno()
    {
        $signo = new VerificarSigno();

        // Teste para o signo de Áries (data de início 21/03 e fim 20/04)
        $data = DateTime::createFromFormat('Y-m-d', '2024-03-25');
        $this->assertTrue($signo->verificar_signo($data, '21/03', '20/04'));

        // Teste para data fora do signo de Áries
        $data = DateTime::createFromFormat('Y-m-d', '2024-05-01');
        $this->assertFalse($signo->verificar_signo($data, '21/03', '20/04'));
    }
}
