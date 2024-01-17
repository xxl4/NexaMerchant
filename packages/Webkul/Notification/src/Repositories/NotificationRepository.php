<?php

namespace Webkul\Notification\Repositories;

<<<<<<< HEAD
use Webkul\Core\Eloquent\Repository;
use Illuminate\Support\Facades\DB;
=======
use Illuminate\Support\Facades\DB;
use Webkul\Core\Eloquent\Repository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class NotificationRepository extends Repository
{
    /**
     * Specify Model class name
<<<<<<< HEAD
     *
     * @return string
     */
    function model(): string
=======
     */
    public function model(): string
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        return 'Webkul\Notification\Contracts\Notification';
    }

    /**
     * Return Filtered Notification resources
     *
     * @param  array  $params
     * @return array
     */
    public function getParamsData($params)
    {
        $query = $this->model->with('order');

        if (isset($params['status']) && $params['status'] != 'All') {
            $query->whereHas('order', function ($q) use ($params) {
                $q->where(['status' => $params['status']]);
            });
        }

        if (isset($params['read']) && isset($params['limit'])) {
            $query->where('read', $params['read'])->limit($params['limit']);
        } elseif (isset($params['limit'])) {
            $query->limit($params['limit']);
        }

        $notifications = $query->latest()->paginate($params['limit'] ?? 10);

        $statusCounts = $this->model->join('orders', 'notifications.order_id', '=', 'orders.id')
            ->select('orders.status', DB::raw('COUNT(*) as status_count'))
            ->groupBy('orders.status')
            ->get();

        return ['notifications' => $notifications, 'status_counts' => $statusCounts];
    }

    /**
     * Return Notification resources
     *
     * @return array
     */
    public function getAll()
    {

        $query = $this->model->with('order');

        $notifications = $query->latest()->paginate($params['limit'] ?? 10);

        $statusCounts = $this->model->join('orders', 'notifications.order_id', '=', 'orders.id')
            ->select('orders.status', DB::raw('COUNT(*) as status_count'))
            ->groupBy('orders.status')
            ->get();

        return ['notifications' => $notifications, 'status_counts' => $statusCounts];
    }
}
