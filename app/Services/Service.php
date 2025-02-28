<?php

namespace App\Services;

use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class Service
{
  protected Repository $repository;

  /**
   * BaseService constructor.
   *
   * @param Repository $repository
   */
  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }

  /**
   * Criar um novo recurso.
   *
   * @param array $data
   * @return Model
   */
  public function store(array $data): Model
  {
    return $this->repository->create($data);
  }

  /**
   * Atualizar um recurso.
   *
   * @param int $id
   * @param array $data
   * @return bool
   */
  public function update(int $id, array $data): bool
  {
    return $this->repository->update($id, $data);
  }

  /**
   * Excluir um recurso.
   *
   * @param int $id
   * @return bool
   */
  public function delete(int $id): bool
  {
    return $this->repository->delete($id);
  }

  /**
   * Listar todos os recursos.
   *
   * @return Collection
   */
  public function all(): Collection
  {
    return $this->repository->all();
  }

  /**
   * Buscar um recurso pelo ID.
   *
   * @param int $id
   * @return Model|null
   */
  public function findById(int $id): ?Model
  {
    return $this->repository->findById($id);
  }
}
