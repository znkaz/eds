<?php

namespace ZnKaz\Eds\Domain\Interfaces\Services;

use ZnCore\Base\Libs\Service\Interfaces\CrudServiceInterface;
use ZnKaz\Eds\Domain\Entities\LogEntity;

interface CrlServiceInterface extends CrudServiceInterface
{

    public function refreshCountByHostId(int $hostId): int;

    public function refreshByHostId(int $hostId): LogEntity;
}

