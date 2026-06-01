<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc;

use Doctrine\DBAL\Exception;
use RuntimeException;

class DbManagerStub extends DbManager
{
    /**
     * @return array<AbstractTable>
     */
    public function getTables(): array
    {
        return \array_values(parent::getTables());
    }

    /**
     * @return array<\Doctrine\DBAL\Schema\Table>
     * @throws DbcRuntimeException
     * @throws DbcRuntimeException
     * @throws Exception
     */
    public function getSchemaTables(): array
    {
        return \array_values(parent::getSchemaTables());
    }
}
