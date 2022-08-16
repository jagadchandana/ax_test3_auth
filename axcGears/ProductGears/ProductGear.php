<?php

namespace Axc\ProductGears;



use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * MerchantGear
 */
class ProductGear extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ProductMethods::class;
    }
}
// Methods Class
class ProductMethods
{
    protected $model;
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Product();
    }
    /**
     * Method all
     *
     * @return ?Collection
     */
    public function all(): ?Collection
    {
        return $this->model->all();
    }
    /** Method own
     *
     * @param Array $params [Parameters Array]
     * @param Int $type [config('systemSettings.OWN_TYPES.SINGLE')]
     * @param Int $paginate [Paginate count if needed]
     *
     * @return mixed
     */
    public function own($params, $type = 1, $paginate = 6): mixed
    {
        return $this->model->own($params, $type, $paginate);
    }
    /**
     * find
     *
     * @param  mixed $id
     * @return Product
     */
    public function find(int $id): ?Product
    {
        return $this->model->findOrFail($id);
    }
    /**
     * findOnly
     *
     * @param  mixed $id
     * @return Product
     */
    public function findOnly(int $id): ?Product
    {
        return $this->model->find($id);
    }
    /**
     * exists
     *
     * @param  mixed $id
     * @return Bool
     */
    public function exists(int $id): Bool
    {
        return $this->model->exists($id);
    }
    /**
     * get
     *
     * @param  mixed $ids
     * @return Collection
     */
    public function get(array $ids): ?Collection
    {
        return $this->model->getByIds($ids);
    }
    /**
     * firstOrCreate
     *
     * @param  mixed $params
     * @return Product
     */
    public function firstOrCreate(array $params): Product
    {
        return $this->model->firstOrCreate($params);
    }
    /**
     * create
     *
     * @param  mixed $data
     * @return Product
     */
    public function create(array $data): Product
    {
        return $this->model->create($data);
    }
    /**
     * update
     *
     * @param  mixed $Product
     * @param  mixed $data
     * @return Bool
     */
    public function update(Product $Product, array $data): Bool
    {
        return $Product->update(array_merge($Product->toArray(), $data));
    }
    /**
     * delete
     *
     * @param  mixed $Product
     * @return bool
     */
    public function delete(Product $Product): ?bool
    {
        return $Product->delete();
    }

}
