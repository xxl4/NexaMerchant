<?php

namespace Webkul\Core;

use Konekt\Concord\Conventions\ConcordDefault;

class CoreConvention extends ConcordDefault
{
    /**
     * Migration folder.
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function migrationsFolder(): string
    {
        return 'Database/Migrations';
    }

    /**
     * Manifest file.
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function manifestFile(): string
    {
        return 'Resources/manifest.php';
    }
}
