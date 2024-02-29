<?php
declare(strict_types=1);

namespace App\Dao;

/**
 *
 */
enum Order: string
{
    case ASC = "ASC";

    case DESC = "DESC";

	public function getOrientation(): string
	{
		return $this->value;
	}
}