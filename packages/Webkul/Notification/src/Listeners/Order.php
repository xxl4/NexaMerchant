<?php

namespace Webkul\Notification\Listeners;

<<<<<<< HEAD
use Webkul\Notification\Repositories\NotificationRepository;
use Webkul\Notification\Events\CreateOrderNotification;
use Webkul\Notification\Events\UpdateOrderNotification;
=======
use Webkul\Notification\Events\CreateOrderNotification;
use Webkul\Notification\Events\UpdateOrderNotification;
use Webkul\Notification\Repositories\NotificationRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class Order
{
    /**
     * Create a new listener instance.
     *
     * @return void
     */
    public function __construct(protected NotificationRepository $notificationRepository)
    {
    }

    /**
     * Create a new resource.
     *
     * @return void
     */
    public function createOrder($order)
    {
        $this->notificationRepository->create(['type' => 'order', 'order_id' => $order->id]);
<<<<<<< HEAD
          
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        event(new CreateOrderNotification);
    }

    /**
     * Fire an Event when the order status is updated.
     *
     * @return void
     */
    public function updateOrder($order)
<<<<<<< HEAD
    { 
=======
    {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        event(new UpdateOrderNotification([
            'id'     => $order->id,
            'status' => $order->status,
        ]));
    }
}
