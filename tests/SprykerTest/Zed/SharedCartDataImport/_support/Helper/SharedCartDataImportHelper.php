<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerTest\Zed\SharedCartDataImport\Helper;

use Codeception\Module;
use Orm\Zed\SharedCart\Persistence\SpyQuoteCompanyUserQuery;

class SharedCartDataImportHelper extends Module
{
    public function ensureDatabaseTableIsEmpty(): void
    {
        $this->getQuoteCompanyUserQuery()->deleteAll();
    }

    public function assertDatabaseTablesContainsData(): void
    {
        $quoteQuery = $this->getQuoteCompanyUserQuery();
        $this->assertTrue($quoteQuery->count() > 0, 'Expected at least one entry in the database table but database table is empty.');
    }

    protected function getQuoteCompanyUserQuery(): SpyQuoteCompanyUserQuery
    {
        return SpyQuoteCompanyUserQuery::create();
    }
}
