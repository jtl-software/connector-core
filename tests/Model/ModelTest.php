<?php
namespace Jtl\Connector\Core\Tests\Model;

use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Test\TestCase;

class ModelTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testModelsInitialization()
    {
        $modelsPattern = dirname(__DIR__).'/../src/Model/*.php';

        $models = glob($modelsPattern);

        $ignoreModels = [
            'AbstractDataModel',
            'AbstractI18n',
            'AbstractIdentity',
            'AbstractImage',
            'AbstractModel',
            'IdentificationInterface',
            'IdentityInterface',
            'I18nInterface',
            'FeatureEntity',
            'FeatureFlag',
            'AbstractOrderAddress',
        ];

        foreach ($models as $model) {

            $fileInfo = new \SplFileInfo($model);
            $modelName = $fileInfo->getBasename('.php');

            if (in_array($modelName, $ignoreModels)) {
                continue;
            }

            $fullModelClassName = sprintf("%s\\%s", Model::MODEL_NAMESPACE, $modelName);

            $obj = new $fullModelClassName();
        }
    }
}
