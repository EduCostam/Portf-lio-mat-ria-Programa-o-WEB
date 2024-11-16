<?php
use PHPUnit\Framework\TestCase;

// Definindo uma classe fictícia para a função verificar_signo
class VerificarSigno
{
    public function verificar_signo($data, $inicio, $fim)
    {
        $ano = $data->format('Y');
        $data_inicio = DateTime::createFromFormat('d/m/Y', "$inicio/$ano");
        $data_fim = DateTime::createFromFormat('d/m/Y', "$fim/$ano");

        // Ajuste para o caso de a data de início ser posterior à data de fim
        if ($data_inicio > $data_fim) {
            $data->format('m') == '01' ? $data_inicio->modify('-1 year') : $data_fim->modify('+1 year');
        }

        return ($data >= $data_inicio && $data <= $data_fim);
    }
}

class VerificarSignoTest extends TestCase
{
    private $verificarSigno;

    // Configuração inicial
    protected function setUp(): void
    {
        $this->verificarSigno = new VerificarSigno();
    }

    // Teste para um signo válido
    public function testVerificarSignoValido()
    {
        // Testando o signo de Áries (21 de março a 20 de abril)
        $data = DateTime::createFromFormat('Y-m-d', '2024-03-25');
        $this->assertTrue($this->verificarSigno->verificar_signo($data, '21/03', '20/04'));
    }

    // Teste para uma data fora do intervalo de Áries
    public function testVerificarSignoInvalido()
    {
        // Testando data fora do signo de Áries
        $data = DateTime::createFromFormat('Y-m-d', '2024-05-01');
        $this->assertFalse($this->verificarSigno->verificar_signo($data, '21/03', '20/04'));
    }

    // Teste para o caso em que a data de início é no final do ano (Exemplo: Capricórnio)
    public function testVerificarSignoFinalAno()
    {
        // Testando o signo de Capricórnio (22 de dezembro a 20 de janeiro)
        $data = DateTime::createFromFormat('Y-m-d', '2024-12-25');
        $this->assertTrue($this->verificarSigno->verificar_signo($data, '22/12', '20/01'));
    }

    // Teste para data fora do intervalo de Capricórnio
    public function testVerificarSignoFinalAnoInvalido()
    {
        $data = DateTime::createFromFormat('Y-m-d', '2024-02-15');
        $this->assertFalse($this->verificarSigno->verificar_signo($data, '22/12', '20/01'));
    }
}
