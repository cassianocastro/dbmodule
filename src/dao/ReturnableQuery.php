<?php
declare(strict_types=1);

namespace DAO;

/**
 *
 */
interface ReturnableQuery
{

    public function appendReturningClause(): void;

}