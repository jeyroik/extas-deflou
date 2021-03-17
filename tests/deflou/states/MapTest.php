<?php
namespace tests\deflou\states;

use Dotenv\Dotenv;
use extas\components\deflou\applications\Application;
use extas\components\deflou\applications\samples\ApplicationSample;
use extas\components\deflou\states\samples\StateSampleToApplicationSampleMap;
use extas\components\deflou\states\samples\StateSampleToEntitySampleMap;
use extas\components\deflou\states\StateToApplicationMap;
use extas\components\deflou\states\StateToEntityMap;
use extas\components\repositories\TSnuffRepositoryDynamic;
use extas\components\THasMagicClass;
use extas\interfaces\deflou\applications\IApplication;
use extas\interfaces\deflou\applications\samples\IApplicationSample;
use PHPUnit\Framework\TestCase;

/**
 * Class MapTest
 *
 * @package tests\deflou\states\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
class MapTest extends TestCase
{
    use TSnuffRepositoryDynamic;
    use THasMagicClass;

    protected function setUp(): void
    {
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->createSnuffDynamicRepositories([
            ['dfApplications', 'name', Application::class]
        ]);
    }

    public function tearDown(): void
    {
        $this->deleteSnuffDynamicRepositories();
    }

    public function testStateToApplicationMap()
    {
        $this->getMagicClass('dfApplications')->create(new Application([
            Application::FIELD__NAME => 'test'
        ]));

        $map = new StateToApplicationMap();
        $map->setApplicationName('test');
        $app = $map->getApplication();

        $this->assertEquals('test', $map->getApplicationName());
        $this->assertInstanceOf(IApplication::class, $app);
        $this->assertEquals('test', $app->getTagTargetId());
        $this->assertEquals('extas.df.application', $app->getTagTargetCategory());
    }

    public function testStateToEntity()
    {
        $map = new StateToEntityMap();
        $this->assertEquals('extas.df.state.to.entity.map', $map->__subject());
    }
}
