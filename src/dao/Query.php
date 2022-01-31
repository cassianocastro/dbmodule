<?php
declare(strict_types=1);

namespace DAO;

/**
 *
 */
final class Query implements ReturnableQuery
{

    private string $template;

	public function __construct(string $template)
	{
		$this->template = $template;
	}

    public function __toString(): string
	{
		return $this->template;
	}

	public function appendSubQuery(self $subquery): void
    {
        $this->template .= " ({$subquery->__toString()})";
    }

	public function appendReturningClause(): void
    {
        $this->template .= " RETURNING *";
    }

	public function appendWhereClause(string $condition): void
    {
        $this->template .= " WHERE $condition";
    }

    public function appendOrderByClause(array $list, Order $order = Order::ASC): void
    {
        $list = implode(", ", $list);
        $this->template .= " ORDER BY $list {$order->getOrientation()}";
    }
}