<?php

namespace App\Repositories;

use App\Models;
use App\Exceptions;
use App\Repositories;
use Illuminate\Pagination;
use Illuminate\Support\Facades\DB;

/**
 * Class DummyRepository.
 */
class DummyRepository extends Repositories\BaseRepository {

    public function model() {
        return Models\DummyModel::class;
    }

    public function __construct(Models\DummyModel $model) {
        $this->model = $model;
    }

    public function getActivePaginated(int $paged = 25, string $orderBy = 'created_at', string $sort = 'desc'): Pagination\LengthAwarePaginator {
        return $this->model->orderBy($orderBy, $sort)->paginate($paged);
    }

    public function getDeletedPaginated(int $paged = 25, string $orderBy = 'created_at', string $sort = 'desc'): Pagination\LengthAwarePaginator {
        return $this->model->onlyTrashed()->orderBy($orderBy, $sort)->paginate($paged);
    }

    /**
     * @param array $data
     * @return Models\DummyModel
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data): Models\DummyModel {
        return DB::transaction(function () use ($data) {
            $DummyVariable = $this->model::create($data);
            if ($DummyVariable) {
                return $DummyVariable;
            }
            throw new Exceptions\GeneralException(__('backend_DummyLabel.exceptions.create_error'));
        });
    }

    /**
     * @param Models\DummyModel $DummyVariable
     * @param array             $data
     * @return Models\DummyModel
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Models\DummyModel $DummyVariable, array $data): Models\DummyModel {
        return DB::transaction(function () use ($DummyVariable, $data) {
            if ($DummyVariable->update($data)) {
                return $DummyVariable;
            }
            throw new Exceptions\GeneralException(__('backend_DummyLabel.exceptions.update_error'));
        });
    }

    public function save(Models\DummyModel $DummyVariable): void {
        $DummyVariable->save();
    }

    /**
     * @param Models\DummyModel $DummyVariable
     * @return Models\DummyModel
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Models\DummyModel $DummyVariable): Models\DummyModel {
        if (is_null($DummyVariable->deleted_at)) {
            throw new GeneralException(__('backend_DummyLabel.exceptions.delete_first'));
        }
        return DB::transaction(function () use ($DummyVariable) {
            if ($DummyVariable->forceDelete()) {
                return $DummyVariable;
            }

            throw new GeneralException(__('backend_DummyLabel.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     * @param Models\DummyModel $DummyVariable
     * @return Models\DummyModel
     * @throws GeneralException
     */
    public function restore(Models\DummyModel $DummyVariable): Models\DummyModel {
        if (is_null($DummyVariable->deleted_at)) {
            throw new GeneralException(__('backend_DummyLabel.exceptions.cant_restore'));
        }
        if ($DummyVariable->restore()) {
            return $DummyVariable;
        }
        throw new GeneralException(__('backend_DummyLabel.exceptions.restore_error'));
    }
}
