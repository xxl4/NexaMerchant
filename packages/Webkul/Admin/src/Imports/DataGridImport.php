<?php

namespace Webkul\Admin\Imports;

use Illuminate\Support\Collection;
<<<<<<< HEAD
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
=======
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class DataGridImport implements ToCollection, WithHeadingRow
{
    use Importable;

    /**
     * @param  Illuminate\Support\Collection  $row
     * @return void
<<<<<<< HEAD
    */
    public function collection(Collection $rows)
    {
    }
}
=======
     */
    public function collection(Collection $rows)
    {
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
