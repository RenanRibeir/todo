<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository
{
  protected Model $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function create(array $data): Model
  {
    return $this->model->create($data);
  }

  public function findById(int $id): ?Model
  {
    return $this->model->find($id);
  }

  public function all(): iterable
  {
    return $this->model->all();
  }

  public function update(int $id, array $data): bool
  {
    $record = $this->model->find($id);
    return $record ? $record->update($data) : false;
  }

  public function delete(int $id): bool
  {
    $record = $this->model->find($id);
    return $record ? $record->delete() : false;
  }
}
