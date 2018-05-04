<?php

class Titulo
{
    private $data;

    // se tentar setar um valor retorna para o método getValor
    public function __get($propriedade)
    {
        if($propriedade == 'valor'){
            return $this->getValor();
        }else{
            return $this->data[$propriedade];
        }
    }

    // responsável pala soma de juros
    public function getValor()
    {
        // recebe a data que foi passada no setVencimento()
        $vecto = new Datetime($this->data['dt_vencimento']);
        // a data de hoje
        $agora = new Datetime('now');
        if($vecto < $agora){
            // diff Retorna a diferença entre dois objetos DateTime
            $interval = $vecto->diff($agora);
            $days = $interval->days;
            return $this->data['valor'] + $this->data['multa'] + ($this->data['valor'] * $this->data['juros'] * $days);
        }else{
            return $this->data['valor'];
        }
    }

    public function __set($propriedade, $valor)
    {
        if($propriedade == 'dt_vencimento'){
            $this->setVencimento($valor);
        }else{
            $this->data[$propriedade] = $valor;
        }
    }
    // responsável pela verificação da data
    public function setVencimento($vencimento)
    {
        $partes = explode('-', $vencimento);
        if(count($partes) == 3){
            if(checkdate($partes[1], $partes[2], $partes[0])){
                $this->data['dt_vencimento'] = $vencimento;
            }else{
                throw new Exception("Data {$vencimento} inválida");
            }
        }
    }

}

// objeto

/*
    o pessoa o programador tenta definir o valor do atributo dt_vencimento. Como esse atributo não existe (visto que é controlado por $data)
    automaticamente o método __set será executado, e consequentemente será executado o método setVencimento().
*/

try{
    $titulo = new Titulo;
    $titulo->dt_vencimento = '2018-02-28';
    $titulo->valor = 100;
    $titulo->multa = 2;
    $titulo->juros = 0.01;

    // na tentativa de setar o $titulo->valor, o método mágico __get redireciona para o método getValor
    // responsável pelo calculo do mesmo.
    print 'O valor é : ' . number_format($titulo->valor, 2, ',', '.');

}catch(Exception $e){
    print $e->getMessage();
}