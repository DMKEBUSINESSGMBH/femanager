<?php

declare(strict_types=1);

namespace In2code\Femanager\DataProcessor;

use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\Arguments;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class AbstractDataProcessor
 */
abstract class AbstractDataProcessor implements DataProcessorInterface
{
    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * @var array
     */
    protected $settings = [];

    /**
     * @var ContentObjectRenderer|null
     */
    protected $contentObject;

    /**
     * @var Arguments|null
     */
    protected $controllerArguments;

    /**
     * AbstractDataProcessor constructor.
     */
    public function __construct(
        array $configuration,
        array $settings,
        ContentObjectRenderer $contentObject,
        Arguments $controllerArguments
    ) {
        $this->configuration = $configuration;
        $this->settings = $settings;
        $this->contentObject = $contentObject;
        $this->controllerArguments = $controllerArguments;
    }

    public function initializeDataProcessor()
    {
    }

    /**
     * @return mixed
     */
    public function getConfiguration(string $path = '')
    {
        $configuration = $this->configuration;
        if (!empty($path)) {
            $configuration = ArrayUtility::getValueByPath($configuration, $path, '.');
        }
        return $configuration;
    }
}
