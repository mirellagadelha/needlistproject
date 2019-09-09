<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

try {
    \PagSeguro\Library::initialize();
} catch (Exception $e) {
    die($e);
}

\PagSeguro\Configuration\Configure::setEnvironment('sandbox');

\PagSeguro\Configuration\Configure::setAccountCredentials(
    env('PAGSEGURO_EMAIL'),
    env('PAGSEGURO_TOKEN')
);

\PagSeguro\Configuration\Configure::setCharset('UTF-8');
\PagSeguro\Configuration\Configure::setLog(true, storage_path('logs/logs'));

try {
    $response = \PagSeguro\Services\Session::create(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );
} catch (Exception $e) {
    die($e->getMessage());
}

class PagseguroController extends Controller
{
    public function checkout(Request $request)
    {
        $payment = new \PagSeguro\Domains\Requests\Payment();
        $payment->addItems()->withParameters(
            $request->get('itemId1'),
            $request->get('itemDescription1'),
            $request->get('itemAmount1'),
            $request->get('itemPrice1')
        );
        $payment->setCurrency("BRL");
        $payment->setReference("LIBPHP000001");

        try {
            $onlyCheckoutCode = true;
            $result = $payment->register(
                \PagSeguro\Configuration\Configure::getAccountCredentials(),
                $onlyCheckoutCode
            );
            $code = $result->getCode();
            return response()->json($code, 201);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}