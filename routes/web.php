<?php

use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/webhook', [WebhookController::class, 'webhook']);

Route::get('/webhook/processa', [WebhookController::class, 'processa_webhook']);

Route::get('/webhook/lista', [WebhookController::class, 'lista_webhook']);

Route::get('/webhook/marca/lido/{id}', [WebhookController::class, 'marca_notificacao_lida']);
