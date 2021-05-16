<?php

class ConectaAD {

    private $usuarioAuth = 'administrador';
    private $senhaAuth = 'T1sup0rt&';
    private $ldap_server = "192.168.74.177";
    private $dominio = 'tcc';
    protected $base_dn = "OU=CHIAOMIBR,DC=tcc,DC=local";
    protected $filter = "(&(objectClass=user)(objectCategory=*))";
    protected $attributes_ad = array("cn", "samaccountname", "description");
    protected $conexao_AD;
    protected $bind;

    function __construct() {
        $this->conectarAD();
   
    }

    public function conectarAD() {
        /* conecta ao servidor de AD */

        if (!($this->conexao_AD = @ldap_connect($this->ldap_server))) {
            echo "Nao foi possivel conectar ao servidor de AD ";
        } else {
            /* autentica usuario no AD */
            if (!($this->bind = @ldap_bind($this->conexao_AD, $this->usuarioAuth . "@" . $this->dominio, $this->senhaAuth))) {
                echo " Nao foi possivel autenticar o usuario ";
            } else {
                /* usuario autenticado */
            }
        }
    }

    public function autenticaUsuarioAD($usuario, $senha) {
        try {
            if (!($this->bind = @ldap_bind($this->conexao_AD, $usuario . "@" . $this->dominio, $senha))) {
                throw new Exception("Usuário ou senha inválido");
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function ad() {
        try {
            /* EXECUTA O FILTRO NO SERVIDOR LDAP */
            $ldap_search = ldap_search($this->conexao_AD, $this->base_dn, $this->filter, $this->attributes_ad);
            /* PEGA AS INFORMAÇÕES QUE O FILTRO RETORNOU */
            $info = ldap_get_entries($this->conexao_AD, $ldap_search);
            echo "<pre>";
            print_r($info);
            echo "</pre>";
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function get_info_usuario($user) {
        /* EXECUTA O FILTRO NO SERVIDOR LDAP */
        $ldap_search = ldap_search($this->conexao_AD, $this->base_dn, $this->filter, $this->attributes_ad);
        /* PEGA AS INFORMAÇÕES QUE O FILTRO RETORNOU */
        $info = ldap_get_entries($this->conexao_AD, $ldap_search);

        $count = $info["count"];
        for ($i = 0; $i < $count; $i++) {
           $userAD = $info[$i]["samaccountname"][0];

            if (isset($userAD)) {

                /* se o usuario pego tiver no ad, entra no if */
                if (strtolower($userAD) === strtolower($user)) {
                    return $arr = array("usuario" => "$userAD", "nome" => $info[$i]["cn"][0]);
                } else {
                    
                }
            }
        }
    }

}
