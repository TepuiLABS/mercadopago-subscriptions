<?php

namespace Tepuilabs\MercadopagoSubscriptions\Commands;

use Illuminate\Console\Command;

class MercadopagoSubscriptionsCommand extends Command
{
    public $signature = 'mercadopago-subscriptions';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
