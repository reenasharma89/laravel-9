<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Models\Order;

use App\Jobs\SendOrderEmail;
use Log;

use App\Utilities\Contracts\ElasticsearchHelperInterface;
use App\Utilities\Contracts\RedisHelperInterface;

class EmailController extends Controller
{
    // TODO: finish implementing send method
    public function send()
    {
        
        for ($i=0; $i<20; $i++) { 
            $order = Order::findOrFail( rand(1,50) ); if (rand(1, 3) > 1) {
                SendOrderEmail::dispatch($order)->onQueue('default');
            } else {
                SendOrderEmail::dispatch($order)->onQueue('orders');
            }
        }

        return 'Dispatched orders';

        // $order = Order::findOrFail( rand(1,50) );

        // SendOrderEmail::dispatch($order);

        // Log::info('Dispatched order ' . $order->id);

        // return 'Dispatched order ' . $order->id;

        // $recipient = 'er.reenasharma89@gmail.com';

        // Mail::to($recipient)->send(new OrderShipped($order));

        // return 'Sent order ' . $order->id;


        /** @var ElasticsearchHelperInterface $elasticsearchHelper */
        $elasticsearchHelper = app()->make(ElasticsearchHelperInterface::class);
        // TODO: Create implementation for storeEmail and uncomment the following line
        // $elasticsearchHelper->storeEmail(...);

        /** @var RedisHelperInterface $redisHelper */
        $redisHelper = app()->make(RedisHelperInterface::class);
        // TODO: Create implementation for storeRecentMessage and uncomment the following line
        // $redisHelper->storeRecentMessage(...);
    }

    //  TODO - BONUS: implement list method
    public function list()
    {

    }
}
