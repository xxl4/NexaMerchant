<?php

namespace Webkul\Core;

use Illuminate\Database\Eloquent\Model;
use Shetabit\Visitor\Visitor as BaseVisitor;
use Webkul\Core\Jobs\UpdateCreateVisitIndex;

class Visitor extends BaseVisitor
{
    /**
     * Create a visit log.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function visit(Model $model = null)
=======
     * @return void
     */
    public function visit(?Model $model = null)
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        foreach ($this->except as $path) {
            if ($this->request->is($path)) {
                return;
            }
        }

        UpdateCreateVisitIndex::dispatch($model, $this->prepareLog());
    }

    /**
     * Retrieve request's url
<<<<<<< HEAD
     *
     * @return string
     */
    public function url() : string
=======
     */
    public function url(): string
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        return $this->request->url();
    }

    /**
     * Returns logs
     *
     * @return array
     */
    public function getLog()
    {
        return $this->prepareLog();
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
