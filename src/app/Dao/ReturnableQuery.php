<?php
declare(strict_types=1);

namespace App\Dao;

/**
 *
 */
interface ReturnableQuery
{

    public function appendReturningClause(): void;
}