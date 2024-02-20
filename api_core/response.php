<?php

class Response{
  //Método que permite construir a resposta da API. A resposta vem do indexphp no status.

  //status indica se tudo ocorreu corretamente, como padrão o valor dele é 200, data como padrão é nulo, mas é através dessa variável que os valores serão retornados.

  //Método estatico, não é necessário a instanciação.
  public static function json($status = 200, $message = 'success', $data = null){
    //Estamos informando a aplicação que vai receber a resposta, de que o conteúdo enviado como resposta está em formato json.
    header('Content-Type: application/json');
    //Checa se a API está ativa
    if(!API_IS_ACTIVE){
      return json_encode([
        'status' => 400,
        'message' => 'api is not running',
        'api_version' => API_VERSION,
        'time_response' => time(),
        'datetime_response' => date('Y-m-d H:i:s'),
        'data' => null
      ], JSON_PRETTY_PRINT /*torna o json mais legivel para usuarios*/);
    }
    //função do php pega uma coleção de dados e transforma-o numa string em formato json.
    return json_encode([
        'status' => $status,
        'message' => $message,
        'api_version' => API_VERSION,
        'time_response' => time(),
        'datetime_response' => date('Y-m-d H:i:s'),
        'data' => $data
    ], JSON_PRETTY_PRINT);
  }
}