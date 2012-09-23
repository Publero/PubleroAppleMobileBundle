<?php
namespace Publero\AppleMobileBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class PubleroAppleMobileExtension extends Extension
{
    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     * @var FileLocator
     */
    private $fileLocator;

    /**
     * @var Symfony\Component\DependencyInjection\Loader
     */
    private $loader;

    /**
     * @var array
     */
    private $config;

    public function load(array $configs, ContainerBuilder $container)
    {
        $this->container = $container;
        $this->fileLocator = new FileLocator(__DIR__.'/../Resources/config');
        $this->loader = new YamlFileLoader($container, $this->fileLocator);
        $this->config = $this->processConfiguration(new Configuration(), $configs);

        $this->loader->load('price_matrix.yml');
        $this->loadMode();
        if (!empty($this->config['store_receipt_class'])) {
            $this->enableStoreReceipt();
        }
    }

    protected function loadMode()
    {
        $verificationUrls = Yaml::parse($this->fileLocator->locate('verification_url.yml'));
        $mode = $this->config['sandbox'] ? 'sandbox' : 'production';
        $verificationUrl = $this->config[$mode];

        $this->container->setParameter('publero_apple_mobile.sandbox', $this->config['sandbox']);
        $this->container->setParameter('publero_apple_mobile.verification_url', $verificationUrl);
    }

    protected function enableStoreReceipt()
    {
        $this->loader->load('receipt_verifier.yml');

        $this->container->setParameter('publero_apple_mobile.store_receipt_class', $this->config['store_receipt_class']);
    }
}
