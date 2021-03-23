<?php
namespace tests\deflou\stores;

use Dotenv\Dotenv;
use extas\components\deflou\stores\Store;
use extas\components\repositories\TSnuffRepositoryDynamic;
use extas\components\THasMagicClass;
use PHPUnit\Framework\TestCase;

/**
 * Class StoreTest
 *
 * @package tests\deflou\stores
 * @author jeyroik <jeyroik@gmail.com>
 */
class StoreTest extends TestCase
{
    use TSnuffRepositoryDynamic;
    use THasMagicClass;

    protected function setUp(): void
    {
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->createSnuffDynamicRepositories([
            ['dfStores', 'name', Store::class]
        ]);
    }

    public function tearDown(): void
    {
        $this->deleteSnuffDynamicRepositories();
    }

    public function testBasic()
    {
        $store = new Store();
        $this->assertEquals(Store::SUBJECT, $store->__subject());
    }
}
