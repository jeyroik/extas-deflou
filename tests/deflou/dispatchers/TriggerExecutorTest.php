<?php
namespace tests\deflou\dispatchers;

use Dotenv\Dotenv;
use extas\components\plugins\decorators\DecoratorContextParameters;
use extas\components\plugins\decorators\DecoratorEntityParameters;
use extas\components\plugins\TSnuffPlugins;
use extas\components\repositories\TSnuffRepositoryDynamic;
use extas\components\THasMagicClass;
use extas\components\workflows\entities\Entity;
use extas\components\workflows\entities\EntityContext;
use extas\components\workflows\transits\TransitResult;
use extas\interfaces\samples\parameters\ISampleParameter;
use extas\interfaces\stages\IStageDeFlouBeforeTriggerExecute;
use PHPUnit\Framework\TestCase;
use tests\deflou\misc\FakeTrigger;

/**
 * Class TriggerExecutorTest
 *
 * @package tests\deflou\dispatchers
 * @author jeyroik <jeyroik@gmail.com>
 */
class TriggerExecutorTest extends TestCase
{
    use TSnuffRepositoryDynamic;
    use THasMagicClass;
    use TSnuffPlugins;

    protected function setUp(): void
    {
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->createSnuffPlugin(DecoratorEntityParameters::class, [IStageDeFlouBeforeTriggerExecute::NAME]);
        $this->createSnuffPlugin(DecoratorContextParameters::class, [IStageDeFlouBeforeTriggerExecute::NAME]);
    }

    public function tearDown(): void
    {
        $this->deleteSnuffPlugins();
    }

    public function testExecutor()
    {
        $context = new EntityContext([
            'context' => [
                'name' => 'is ok'
            ]
        ]);
        $entity = new Entity([
            'entity' => [
                'name' => 'is ok'
            ]
        ]);
        $result = new TransitResult();

        $trigger = new FakeTrigger([
            FakeTrigger::FIELD__CLASS => FakeTrigger::class,
            FakeTrigger::FIELD__PARAMETERS => [
                'test' => [
                    ISampleParameter::FIELD__NAME => 'test',
                    ISampleParameter::FIELD__VALUE => '@entity.name'
                ],
                'me' => [
                    ISampleParameter::FIELD__NAME => 'me',
                    ISampleParameter::FIELD__VALUE => '@context.name'
                ]
            ]
        ]);
        $trigger->dispatch($context, $result, $entity);

        $this->assertTrue(
            $entity->has(FakeTrigger::FIELD__TRIGGER_PARAMS),
            'Missed trigger parameters'
        );
        $this->assertEquals(
            [
                'test' => 'is ok',
                'me' => 'is ok'
            ],
            $trigger->getParametersValues(),
            'Incorrect parameters replacing'
        );
    }
}
