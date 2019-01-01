<?php

namespace ClawRock\Debug\Plugin\PageCache;

/**
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
class KernelPlugin
{
    /**
     * @var \ClawRock\Debug\Model\Storage\HttpStorage
     */
    private $httpStorage;

    public function __construct(
        \ClawRock\Debug\Model\Storage\HttpStorage $httpStorage
    ) {
        $this->httpStorage = $httpStorage;
    }

    /**
     * @param \Magento\Framework\App\PageCache\Kernel    $subject
     * @param \Magento\Framework\App\Response\Http|false $result
     * @return \Magento\Framework\App\Response\Http|false
     */
    public function afterLoad(\Magento\Framework\App\PageCache\Kernel $subject, $result)
    {
        if ($result !== false) {
            $this->httpStorage->markAsFPCRequest();
        }

        return $result;
    }
}
