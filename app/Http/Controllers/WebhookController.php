<?php

namespace App\Http\Controllers;

use App\Models\Acordo;
use App\Models\AcordoNegociacao;
use App\Models\Modalidade;
use App\Models\Usuario;
use App\Models\WebhookNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;


class WebhookController extends Controller{

	public function __construct(){
	//	$this->middleware('auth');
	}

	public function webhook(Request $request){

        if($request){
            $webwook_notification = new WebhookNotification;
            $webwook_notification->notification_id = $request->header('X-Cobransaas-Delivery');
            $webwook_notification->notification_event = $request->header('X-Cobransaas-Event');
            $webwook_notification->notification_secret = $request->header('X-Cobransaas-Secret');
            $webwook_notification->notification_content = $request->getContent();
            $webwook_notification->notification_status = 0;
            $webwook_notification->save();

            if($webwook_notification){
                return 1;
            }
        }
	}

    public function processa_webhook(){
        $notifications = WebhookNotification::whereNotificationStatus(0)
            ->whereNotificationEvent('webhook.acordo.inclusao')
            ->orderBy('id', 'asc')
            ->limit(10)
            ->get();

        foreach ($notifications as $notification){

            if($notification->notification_event == 'webhook.acordo.inclusao'){
                $not = json_decode($notification->notification_content);

                dd($not);

                $acordo = Acordo::updateOrCreate(
                    [
                        'id' => $not->id
                    ],
                    [
                        'idExterno' => $not->idExterno,
                        'cliente' => $not->cliente,
                        'cobrador' => $not->cobrador,
                        'tipo' => $not->tipo,
                        'numeroAcordo' => $not->numeroAcordo,
                        'numeroParcelas' => $not->numeroParcelas,
                        'dataOperacao' => Carbon::createFromFormat('Y-m-d',$not->dataOperacao),
                        'dataEmissao' => Carbon::createFromFormat('Y-m-d',$not->dataEmissao),
                        'dataProcessamento' => ($not->dataProcessamento) ? Carbon::createFromFormat('Y-m-d',$not->dataProcessamento) : null,
                        'dataHoraInclusao' =>  Carbon::parse($not->dataHoraInclusao),
                        //'dataHoraInclusao' =>  Carbon::createFromFormat('Y-m-d\TH:i:s.u',$not->dataHoraInclusao),
                        'dataHoraModificacao' =>  Carbon::parse($not->dataHoraModificacao),
                        // 'dataHoraModificacao' =>  Carbon::createFromFormat('Y-m-d\TH:i:s.u',$not->dataHoraModificacao),
                        'dataVencimento' => $not->dataVencimento,
                        'situacao' => $not->situacao,
                        'taxaOperacao' => $not->taxaOperacao,
                        'taxaCet' => $not->taxaCet,
                        'valorPagoTributo' => $not->valorPagoTributo,
                        'valorPrincipal' => $not->valorPrincipal,
                        'valorJuros' => $not->valorJuros,
                        'valorTarifa' => $not->valorTarifa,
                        'valorTributo' => $not->valorTributo,
                        'valorAdicionado' => $not->valorAdicionado,
                        'valorTotal' => $not->valorTotal,
                        'saldoPrincipal' => $not->saldoPrincipal,
                        'saldoTotal' => $not->saldoTotal,
                        'saldoAtual' => $not->saldoAtual,
                        'diasAtraso' => $not->diasAtraso,
                        'linkPagamento' => $not->linkPagamento,
                    //    'ContratoID' => $not->ContratoID,
                    //    'MotivoCancelamentoID' => $not->MotivoCancelamentoID,
                        'NegociacaoID' => $not->negociacao->id,
                        'criterioTributo' => $not->criterioTributo,
                    //    'produtoID' => $not->produtoID,
                    //    'tributoID' => $not->tributoID,
                    //    'meioPagamentoID' => $not->meioPagamentoID,
                        'usuarioID' => $not->usuario->id,
                    //    'usuarioCanceladorID' => $not->usuarioCanceladorID,
                    //    'assessoriaID' => $not->assessoriaID,
                    //    'parcelas' => $not->parcelas,
                    //    'pagamentos' => $not->pagamentos,
                    //    'origens' => $not->origens,
                    //    'pendencias' => $not->pendencias
                    ]
                );

                $negociacao = AcordoNegociacao::updateOrCreate(
                    [
                        'id' => $not->negociacao->id
                    ],
                    [
                        'nome' => $not->negociacao->nome,
                        'descricao' => $not->negociacao->descricao,
                        'situacao' => $not->negociacao->situacao,
                        'tipo' => $not->negociacao->tipo,
                        'gestao' => $not->negociacao->gestao,
                        'cor' => $not->negociacao->cor,
                        'icone' => $not->negociacao->icone,
                        'tipoDesconto' => $not->negociacao->tipoDesconto,
                        'proposta' => $not->negociacao->proposta,
                        'dataInicio' =>  Carbon::parse($not->negociacao->dataInicio),
                        'dataFim' =>  Carbon::parse($not->negociacao->dataFim),
                        'modalidadeID' => $not->negociacao->modalidade->id,
                        'tipoRegistroBoleto' => $not->negociacao->tipoRegistroBoleto,
                    ]
                );


                $modalidade = Modalidade::updateOrCreate(
                    [
                        'id' => $not->negociacao->modalidade->id
                    ],
                    [
                        'nome' => $not->negociacao->modalidade->nome,
                        'tipo' => $not->negociacao->modalidade->tipo,
                        'situacao' => $not->negociacao->modalidade->situacao,
                        'gestao' => $not->negociacao->modalidade->gestao,
                        'cor' => $not->negociacao->modalidade->cor,
                        'valorDistorcao' => $not->negociacao->modalidade->valorDistorcao,
                        'percentualDistorcao' => $not->negociacao->modalidade->percentualDistorcao,
                        'atrasoMaximo' => $not->negociacao->modalidade->atrasoMaximo,
                        'atrasoEntrada' => $not->negociacao->modalidade->atrasoEntrada,
                        'acaoOrigemLiquidaca' => $not->negociacao->modalidade->acaoOrigemLiquidaca,
                    ]
                );


                $usuario = Usuario::updateOrCreate(
                    [
                        'id' => $not->usuario->id
                    ],
                    [
                        'nome'  => $not->usuario->nome,
//                        'idExterno'  => $not->usuario->nome,
//                        'codigo'  => $not->usuario->nome,
//                        'cpf'  => $not->usuario->nome,
//                        'situacao'  => $not->usuario->nome,
//                        'email'  => $not->usuario->nome,
//                        'perfil'  => $not->usuario->nome,
                    ]
                );

                if($acordo){
                    $notification->notification_status = 4;
                    $notification->save();
                }

            }
        }

    }

    public function lista_webhook(){
        $notifications = WebhookNotification::whereNotificationStatus(0)
           // ->whereNotificationEvent('webhook.acordo.inclusao')
            ->orderBy('id', 'asc')
            ->limit(50)
            ->get();

        return json_encode($notifications);
    }

    public function marca_notificacao_lida(Request $request, $id){

        $webwook_notification = WebhookNotification::whereId($id)->first();
        if($webwook_notification){
            $webwook_notification->notification_status = 4;
            $webwook_notification->save();

            return response('OK', 200);
        }else{
            return response('NOK', 400);
        }

    }
}
