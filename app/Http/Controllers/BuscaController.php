<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Sintegra;
use Sunra\PhpSimple\HtmlDomParser;


class BuscaController extends Controller
{

    public function index(Request $request)        
    {
        
        $this->validate($request, [
            'cnpj' => 'required',
        ]);
        
        // Dados que serão usados no post
        $cnpj = $request->input('cnpj');
        $servidor = 'http://www.sintegra.es.gov.br/resultado.php';
        
        
        // Parâmetros da requisição post
        $dadosConsulta = http_build_query(array(
            'num_cnpj' => $cnpj,
            'botao'=>'Consultar'
        ));
        
        $post = stream_context_create(array(
            'http' => array(
                'method' => 'POST',                    
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $dadosConsulta                            
            )
        ));
        
        // Obtém os dados do servidor
        $conteudo = file_get_contents($servidor, null, $post); 
        
        // Carrega a resposta no HtmlDomParser
        $html = HtmlDomParser::str_get_html($conteudo);
        
        // Loop para extrair o valor dos elementos desejados da página html
        $dados = array();
        foreach($html->find('td.valor') as $elemento) {
               $dados[] = $elemento->plaintext;
        }

        // Converte resposta em Json
        $dados_json = response()->json($dados);
 
        // Grava os dados no banco de dados
        $registro = new Sintegra;
        $registro->usuario = Auth::user()->id;
        $registro->cnpj = $cnpj;
        $registro->resultado_json = $dados_json;
        $registro->save();
      
        // Exibe Json
        return $dados_json;  
       
    }
   
}
