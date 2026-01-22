<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditableObserver
{
    public function created(Model $model): void
    {
        $this->log('created', $model, [], $model->getAttributes());
    }

    public function updated(Model $model): void
    {
        $this->log(
            'updated',
            $model,
            $model->getOriginal(),
            $model->getChanges()
        );
    }

    public function deleted(Model $model): void
    {
        $this->log('deleted', $model, $model->getOriginal(), []);
    }

    protected function log(
        string $action,
        Model $model,
        array $oldValues,
        array $newValues
    ): void {
        AuditLog::create([
            'user_id'        => Auth::id(),
            'action'         => $action,
            'auditable_type' => get_class($model),
            'auditable_id'   => $model->getKey(),
            'old_values'     => $oldValues ?: null,
            'new_values'     => $newValues ?: null,
            'ip_address'     => Request::ip(),
        ]);
    }
}
