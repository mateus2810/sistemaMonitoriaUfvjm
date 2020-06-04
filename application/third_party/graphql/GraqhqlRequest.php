<?php

use GraphQL\Client;
use GraphQL\RawObject;

class GraqhqlRequest
{
    protected $appId;
    protected $appKey;
    protected $GRAPHQL_URL;
    protected $client;

    /**
     * Grapql_model constructor.
     * @param null $headers Vetor com o cabeçalho de autenticação do usuário e da aplicação
     */
    public function __construct($headers = null)
    {
        $this->appId = getenv('GRAPHQL_APP_ID');
        $this->appKey = getenv('GRAPHQL_APP_KEY');

        $this->GRAPHQL_URL = getenv('GRAPHQL_URL');

        // Caso os cabeçalhos tenham sido enviados, contruindo o cliente GraphQL com as informações de cabeçalho
        if(is_object($headers)
            && property_exists($headers,'Application')
            && property_exists($headers, 'Authorization')
        ){
            $this->client = new Client(
                $this->GRAPHQL_URL,
                [
                    'Application' => $headers->Application,
                    'Authorization' => $headers->Authorization
                ]
            );
        } else {
            $this->client = new Client(
                $this->GRAPHQL_URL
            );
        }
    }

    /**
     * Gera o input oara os dados de aplicação
     *
     * @return RawObject Entrada na controle de aplicações
     */
    protected function generateAppInput(){
        return new RawObject("{ appId: \"{$this->appId}\" appKey: \"{$this->appKey}\" }");
    }

    /**
     * Gera o input para os dados de usuário
     *
     * @param String $login Login do usuário
     * @param String $password Senha do usuário
     * @return RawObject Entrada para controle de usuários
     */
    protected function generateUserInput(String $login, String $password){
        return new RawObject("{ login: \"${login}\" password: \"${password}\" }");
    }

}
