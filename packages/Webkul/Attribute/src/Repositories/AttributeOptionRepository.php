<?php

namespace Webkul\Attribute\Repositories;

use Illuminate\Http\UploadedFile;
use Webkul\Core\Eloquent\Repository;

class AttributeOptionRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return 'Webkul\Attribute\Contracts\AttributeOption';
    }

    /**
<<<<<<< HEAD
     * @param  array  $data
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return  \Webkul\Attribute\Contracts\AttributeOption
     */
    public function create(array $data)
    {
        $option = parent::create($data);

        $this->uploadSwatchImage($data, $option->id);

        return $option;
    }

    /**
<<<<<<< HEAD
     * @param  array   $data
     * @param  int     $id
     * @param  string  $attribute
     * @return  \Webkul\Attribute\Contracts\AttributeOption
     */
    public function update(array $data, $id, $attribute = "id")
=======
     * @param  int  $id
     * @param  string  $attribute
     * @return  \Webkul\Attribute\Contracts\AttributeOption
     */
    public function update(array $data, $id, $attribute = 'id')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        $option = parent::update($data, $id);

        $this->uploadSwatchImage($data, $id);

        return $option;
    }

    /**
     * @param  array  $data
     * @param  int  $optionId
     * @return void
     */
    public function uploadSwatchImage($data, $optionId)
    {
        if (empty($data['swatch_value'])) {
            return;
        }

        if ($data['swatch_value'] instanceof UploadedFile) {
            parent::update([
                'swatch_value' => $data['swatch_value']->store('attribute_option'),
            ], $optionId);
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
