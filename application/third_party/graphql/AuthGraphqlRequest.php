<?php

require('GraqhqlRequest.php');

use GraphQL\Query;
use GraphQL\RawObject;

class AuthGraphqlRequest extends GraqhqlRequest
{

    public function loginContaInstitucional($request)
    {
        $appInput = $this->generateAppInput();
        $userInput = $this->generateUserInput($request->containstitucional, $request->password);

        $input = new RawObject("{ appInput: $appInput userInput: $userInput }");

        $gql = (new Query('generateTokens'))
            ->setArguments(['input' => $input])
            ->setSelectionSet(
                [
                    (new Query('headers'))
                        ->setSelectionSet(
                            [
                                'Application',
                                'Authorization'
                            ]
                        )
                ]
            );

        $results = $this->client->runQuery($gql);
        return $results->getResults()->data->generateTokens->headers;
    }

    /**
     * @return array Vetor com informações do usuário logado
     */
    public function me(){
        $gql = (
        new Query('me'))
            ->setSelectionSet(
                [
                    (
                    new Query('vinculos'))
                        ->setSelectionSet(
                            [
                                'tipoVinculo',
                                'listaVinculos'
                            ]
                        ),
                    'nome',
                    'cpf',
                    'containstitucional'
                ]
            );

        $results = $this->client->runQuery($gql);
        return $results->getResults()->data->me;
    }

}
