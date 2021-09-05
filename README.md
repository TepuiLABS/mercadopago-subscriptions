<p align="center"><img width="160" src="https://cdn.tepuilabs.dev/circle.svg"></p>


### mercadopago-subscriptions

paquete para gestionar planes y suscripciones con mercado pago.


### instalación
___

```bash
composer require tepuilabs/mercadopago-subscriptions
```

### como usar
___

> aca voy a suponer que sabes como obtener el access token y el token de la tarjeta de credito



#### crear plan

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tepuilabs\MercadopagoSubscriptions\MercadopagoSubscriptions;

class CreatePlanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Tepuilabs\MercadopagoSubscriptions\MercadopagoSubscriptions $mpSubscriptions
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, MercadopagoSubscriptions $mpSubscriptions)
    {
        $params = [
            'back_url' => 'https://www.mercadopago.com.ar',
            'reason' => 'Plan Pase Mensual Gold',
            'auto_recurring' => [
                'frequency' =>  '1',
                'frequency_type' => 'months',
                'transaction_amount' => 1100,
                'currency_id' => 'ARS',
                'repetitions' => 12,
                'free_trial' => [
                    'frequency_type' => 'months',
                    'frequency' =>  '1',
                ]
            ]
        ];

        return $mpSubscriptions->createPlan($token = '', $params);
    }
}

```
<details>
    <summary>respuesta</summary>

```yml
{
    "id": "2c938084726e18d60172750000000000",
    "preapproval_plan_id": "2c938084726e18d60170001112223334",
    "payer_id": 100200300,
    "payer_email": "test_user_XXXX@testuser.com",
    "back_url": "https://www.mercadopago.com.ar/",
    "collector_id": 10101,
    "application_id": 1234567812345678,
    "status": "authorized",
    "reason": "Plan Pase Mensual Gold",
    "external_reference": "125124513",
    "date_created": "2020-06-02T08:37:42.734-04:00",
    "last_modified": "2020-06-02T08:37:42.735-04:00",
    "init_point":  "https://www.mercadopago.com/mlm/debits/new?preapproval_id=2c938084726e18d60172750000000000",
    "sandbox_init_point": "https://sandbox.mercadopago.com/mlm/debits/new?preapproval_id=2c938084726e18d60172750000000000",
    "auto_recurring": {
        "frequency": 1,
        "frequency_type": "months",
        "transaction_amount": 1100,
        "currency_id": "ARS",
        "start_date": "2020-07-02T08:37:42.734-04:00",
        "end_date": "2021-07-02T11:59:52.581-04:00"
}
```


> Nota: es importante guardar el valor de `id` ya que es necesario para los siguientes pasos


</details>


#### crear suscripcion

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tepuilabs\MercadopagoSubscriptions\MercadopagoSubscriptions;

class CreatePlanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Tepuilabs\MercadopagoSubscriptions\MercadopagoSubscriptions $mpSubscriptions
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, MercadopagoSubscriptions $mpSubscriptions)
    {
        $params = [
            'preapproval_plan_id' => '2c938084726e18d60172750000000000',
            'card_token_id' => '9fca87c7338585abd000111222333444',
            'payer_email' => 'test_user_XXXX@testuser.com',
        ];

        return $mpSubscriptions->createSubs($token = '', $params);
    }
}

```

<details>
    <summary>respuesta</summary>

```yml
{
    "id": "2c938084726e18d60172750000000000",
    "preapproval_plan_id": "2c938084726e18d60170001112223334",
    "payer_id": 100200300,
    "payer_email": "test_user_XXXX@testuser.com",
    "back_url": "https://www.mercadopago.com.ar/",
    "collector_id": 10101,
    "application_id": 1234567812345678,
    "status": "authorized",
    "reason": "Plan Pase Mensual Gold",
    "external_reference": "125124513",
    "date_created": "2020-06-02T08:37:42.734-04:00",
    "last_modified": "2020-06-02T08:37:42.735-04:00",
    "init_point":  "https://www.mercadopago.com/mlm/debits/new?preapproval_id=2c938084726e18d60172750000000000",
    "sandbox_init_point": "https://sandbox.mercadopago.com/mlm/debits/new?preapproval_id=2c938084726e18d60172750000000000",
    "auto_recurring": {
        "frequency": 1,
        "frequency_type": "months",
        "transaction_amount": 1100,
        "currency_id": "ARS",
        "start_date": "2020-07-02T08:37:42.734-04:00",
        "end_date": "2021-07-02T11:59:52.581-04:00"
}
```

</details>
