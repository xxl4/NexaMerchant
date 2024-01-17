<?php

namespace Webkul\Core\Listeners;

use Spatie\ResponseCache\Events\ResponseCacheHit as ResponseCacheHitEvent;
<<<<<<< HEAD
use Webkul\Core\Jobs\UpdateCreateVisitIndex;
use Webkul\Core\Jobs\UpdateCreateVisitableIndex;
=======
use Webkul\Core\Jobs\UpdateCreateVisitableIndex;
use Webkul\Core\Jobs\UpdateCreateVisitIndex;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class ResponseCacheHit
{
    /**
     * @param  \Spatie\ResponseCache\Events\ResponseCacheHit  $request
     * @return void
     */
    public function handle(ResponseCacheHitEvent $event)
    {
        $log = visitor()->getLog();

        if (request()->route()->getName() == 'shop.home.index') {
            UpdateCreateVisitIndex::dispatch(null, $log);

            return;
        }

        UpdateCreateVisitableIndex::dispatch(array_merge($log, [
            'path_info' => $event->request->getPathInfo(),
        ]));
    }
}
