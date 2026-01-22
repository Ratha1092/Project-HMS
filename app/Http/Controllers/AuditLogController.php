<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Services\AuditLogService;

class AuditLogController extends Controller
{
    public function __construct(
        private readonly AuditLogService $service
    ) {
        // Removed authorize from constructor
    }

    public function index()
    {
        $this->authorize('viewAny', AuditLog::class);
        return view('audit-logs.index', [
            'logs' => $this->service->list(),
        ]);
    }
}
