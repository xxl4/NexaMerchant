<?php

namespace Webkul\Core;

use Illuminate\Support\Facades\Request;

<<<<<<< HEAD
class Tree {

=======
class Tree
{
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    /**
     * Contains tree item
     *
     * @var array
     */
<<<<<<< HEAD
	public $items = [];
=======
    public $items = [];
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

    /**
     * Contains acl roles
     *
     * @var array
     */
<<<<<<< HEAD
	public $roles = [];
=======
    public $roles = [];
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

    /**
     * Contains current item route
     *
     * @var string
     */
<<<<<<< HEAD
	public $current;
=======
    public $current;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

    /**
     * Contains current item key
     *
     * @var string
     */
<<<<<<< HEAD
	public $currentKey;
=======
    public $currentKey;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

    /**
     * Create a new instance.
     *
     * @return void
     */
<<<<<<< HEAD
	public function __construct()
	{
		$this->current = Request::url();
	}

	/**
	 * Shortcut method for create a Config with a callback.
	 * This will allow you to do things like fire an event on creation.
	 *
	 * @param  callable  $callback Callback to use after the Config creation
	 * @return object
	 */
	public static function create($callback = null)
	{
		$tree = new Tree();

		if ($callback) {
			$callback($tree);
		}

		return $tree;
	}

	/**
	 * Add a Config item to the item stack
	 *
	 * @param  string  $item
	 * @return void
	 */
	public function add($item, $type = '')
	{
        $item['children'] = [];

		if ($type == 'menu') {
            $item['url'] = route($item['route'], $item['params'] ?? []);

			if (strpos($this->current, $item['url']) !== false) {
                $this->currentKey = $item['key'];
			}
		} elseif ($type == 'acl') {
			$item['name'] = trans($item['name']);

			$this->roles[$item['route']] = $item['key'];
		}

		$children = str_replace('.', '.children.', $item['key']);

		core()->array_set($this->items, $children, $item);
	}

	/**
	 * Method to find the active links
	 *
	 * @param  array  $item
	 * @return string|void
	 */
	public function getActive($item)
	{
		$url = trim($item['url'], '/');

		if (
			strpos($this->current, $url) !== false
			|| (strpos($this->currentKey, $item['key']) === 0)
		) {
			return true;
		}
	}
=======
    public function __construct()
    {
        $this->current = Request::url();
    }

    /**
     * Shortcut method for create a Config with a callback.
     * This will allow you to do things like fire an event on creation.
     *
     * @param  callable  $callback Callback to use after the Config creation
     * @return object
     */
    public static function create($callback = null)
    {
        $tree = new Tree();

        if ($callback) {
            $callback($tree);
        }

        return $tree;
    }

    /**
     * Add a Config item to the item stack
     *
     * @param  string  $item
     * @return void
     */
    public function add($item, $type = '')
    {
        $item['children'] = [];

        if ($type == 'menu') {
            $item['url'] = route($item['route'], $item['params'] ?? []);

            if (strpos($this->current, $item['url']) !== false) {
                $this->currentKey = $item['key'];
            }
        } elseif ($type == 'acl') {
            $item['name'] = trans($item['name']);

            $this->roles[$item['route']] = $item['key'];
        }

        $children = str_replace('.', '.children.', $item['key']);

        core()->array_set($this->items, $children, $item);
    }

    /**
     * Method to find the active links
     *
     * @param  array  $item
     * @return string|void
     */
    public function getActive($item)
    {
        $url = trim($item['url'], '/');

        if (
            strpos($this->current, $url) !== false
            || (strpos($this->currentKey, $item['key']) === 0)
        ) {
            return true;
        }
    }

    /**
     * Remove unauthorized urls.
     */
    public function removeUnauthorizedUrls(): array
    {
        return collect($this->items)->map(function ($item) {
            $this->removeChildrenUnauthorizedUrls($item);

            return $item;
        })->toArray();
    }

    /**
     * Remove all children unauthorized urls. This will handle all levels.
     */
    private function removeChildrenUnauthorizedUrls(array &$item): void
    {
        if (! empty($item['children'])) {
            $firstChildrenItem = collect($item['children'])->first();

            $item['route'] = $firstChildrenItem['route'];

            $item['url'] = route($firstChildrenItem['route'], $firstChildrenItem['params'] ?? []);

            $this->removeChildrenUnauthorizedUrls($firstChildrenItem);
        }
    }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
}
