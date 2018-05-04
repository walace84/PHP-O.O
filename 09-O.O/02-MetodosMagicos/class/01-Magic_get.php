<?php 

class Titulo
{
    private $dt_vencimento;
    private $valor;
    private $juros;
    private $multa;

    public function __get($propriedade)
    {
        if($propriedade == 'valor'){
            print "Tentou acessar '{$propriedade}' inacessivel, use getValor() <br>\n";
            return 0;
        }
    }
}

$titulo = new Titulo();
print $titulo->valor;

// O atributo é privado e não pode ser acessado, gerando um msg de erro
// o mpetodo mágico ferifica se determinado atributo tentou ser acesso.