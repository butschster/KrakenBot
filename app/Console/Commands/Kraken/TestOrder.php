<?php

namespace App\Console\Commands\Kraken;

use App\Services\Kraken\Order;
use Illuminate\Console\Command;
use App\Contracts\Services\Kraken\Client;

class TestOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kraken:test-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make test order';

    /**
     * @param Client $client
     * @throws \App\Services\Kraken\KrakenApiErrorException
     */
    public function handle(Client $client)
    {
        //type: MARKET, volume: 0.001, symbol: USDETH
        $order = $client->addOrder(
            new Order('ETHUSD', Order::TYPE_SELL, Order::ORDER_TYPE_MARKET, 0.1)
        );

        dd($order);
    }
}