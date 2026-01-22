<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AuditLogRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AuditLogService
{
    public function __construct(
        private readonly AuditLogRepositoryInterface $logs
    ) {}

    public function list(): LengthAwarePaginator
    {
        return $this->logs->paginate();
    }
}
