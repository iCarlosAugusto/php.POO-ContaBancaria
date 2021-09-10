<?php

class ContaBanco{
    public $numConta;
    public $tipo; #CC/CP
    public $dono;
    public $saldo;
    public $status;

    public function setTipo($t){
        $this->tipo = $t;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setDono($d){
        $this->dono = $d;
    }

    public function getDono(){
        return $this->dono;
    }

    public function setSaldo($s){
        $this->saldo = $s;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function __construct($tipoConta, $dono){
        if($tipoConta == "Conta Corrente"){
            $this->setSaldo(50);
        }
        elseif($tipoConta == "Conta Poupança"){
            $this->setSaldo(150);
        }

        $this->setDono($dono);
        $this->setTipo($tipoConta);
        $this->getTipo();
    }

    public function abrirConta(){
        echo "Conta aberta! <br>";
        $this->status = true;
    }

    public function fecharConta(){
        if($this->getSaldo > 0 || $this->getSaldo < 0){
            echo "Ação impossibilitada <br>";
        }
        $this->status = false;
        echo "Conta fechada! <br>";
    }

    public function depositar($valor){
        if($this->status == true){
            $valorDepositado = $this->getSaldo() + $valor;
            $this->setSaldo($valorDepositado);
            echo "Valor depositado! <br>";
        }else{
            echo "Ação impossibilitada <br>";
        }
    }

    public function sacar($valor){
        if($this->status == true && $valor > $this->saldo){
            $valorSacado = $this->getSaldo() - $valor;
            $this->setSaldo($valorSacado);
            echo "Valor Sacado! <br>";
        }else{
            echo "Ação impossibilitada <br>";
        }
    }

    public function pagarMensalidade(){
        if($this->getTipo == "Conta Corrente"){
            $this->getSaldo() - 12;
        }elseif($this->getTipo == "Conta Poupança"){
            $this->getSaldo() - 20;
        }
        
        
        echo "Mensalidade paga! <br>";
    }
}
