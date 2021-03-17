<?php
namespace tests\deflou\states\samples;

use Dotenv\Dotenv;
use extas\components\deflou\applications\samples\ApplicationSample;
use extas\components\deflou\states\samples\StateSampleToApplicationSampleMap;
use extas\components\deflou\states\samples\StateSampleToEntitySampleMap;
use extas\components\repositories\TSnuffRepositoryDynamic;
use extas\components\THasMagicClass;
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
            ['dfApplicationsSamples', 'name', ApplicationSample::class]
        ]);
    }

    public function tearDown(): void
    {
        $this->deleteSnuffDynamicRepositories();
    }

    public function testStateSampleToApplicationSampleMap()
    {
        $this->getMagicClass('dfApplicationsSamples')->create(new ApplicationSample([
            ApplicationSample::FIELD__NAME => 'test'
        ]));

        $map = new StateSampleToApplicationSampleMap();
        $map->setApplicationSampleName('test');
        $sample = $map->getApplicationSample();

        $this->assertEquals('test', $map->getApplicationSampleName());
        $this->assertInstanceOf(IApplicationSample::class, $sample);
        $this->assertEquals('test', $sample->getTagTargetId());
        $this->assertEquals('extas.df.application.sample', $sample->getTagTargetCategory());
    }

    public function testStateSampleToEntitySample()
    {
        $map = new StateSampleToEntitySampleMap();
        $this->assertEquals('extas.df.state.sample.to.entity.sample.map', $map->__subject());
    }
}
