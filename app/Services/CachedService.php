<?php

namespace App\Services;

use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

abstract class CachedService extends Service
{
  protected string $cacheKey;
  protected int $cacheDuration;

  public function __construct(Repository $repository, string $cacheKey, int $cacheDuration = 60)
  {
    parent::__construct($repository);
    $this->cacheKey = $cacheKey;
    $this->cacheDuration = $cacheDuration;
  }

  /**
   * Listar todos os recursos com cache.
   *
   * @return Collection
   */
  public function all(): Collection
  {
    return Cache::remember($this->cacheKey . '.all', $this->cacheDuration, function () {
      return parent::all();
    });
  }

  /**
   * Buscar um recurso pelo ID com cache.
   *
   * @param int $id
   * @return Model|null
   */
  public function findById(int $id): ?Model
  {
    return Cache::remember($this->cacheKey . '.' . $id, $this->cacheDuration, function () use ($id) {
      return parent::findById($id);
    });
  }

  /**
   * Criar um novo recurso e limpar o cache.
   *
   * @param array $data
   * @return Model
   */
  public function store(array $data): Model
  {
    $model = parent::store($data);
    Cache::forget($this->cacheKey . '.all');
    return $model;
  }

  /**
   * Atualizar um recurso e limpar o cache.
   *
   * @param int $id
   * @param array $data
   * @return bool
   */
  public function update(int $id, array $data): bool
  {
    $result = parent::update($id, $data);
    Cache::forget($this->cacheKey . '.' . $id);
    Cache::forget($this->cacheKey . '.all');
    return $result;
  }

  /**
   * Excluir um recurso e limpar o cache.
   *
   * @param int $id
   * @return bool
   */
  public function delete(int $id): bool
  {
    $result = parent::delete($id);
    Cache::forget($this->cacheKey . '.' . $id);
    Cache::forget($this->cacheKey . '.all');
    return $result;
  }
}
