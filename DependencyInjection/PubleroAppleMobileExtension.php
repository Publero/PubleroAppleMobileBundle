<?php

namespace Publero\AppleMobileBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Yaml;

class PubleroAppleMobileExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $fileLocator = new FileLocator(__DIR__.'/../Resources/config');

        $loader = new YamlFileLoader($container, $fileLocator);
        $loader->load('price_matrix.yml');
        $loader->load('receipt_verifier.yml');

        $config = $this->processConfiguration(new Configuration(), $configs);

        $verificationUrls = Yaml::parse($fileLocator->locate('verification_url.yml'));
        if ($config['sandbox']) {
            $verificationUrl = $verificationUrls['sandbox'];
        } else {
            $verificationUrl = $verificationUrls['production'];
        }

        $container->setParameter($this->getAlias() . '.store_receipt_class', $config['store_receipt_class']);
        $container->setParameter($this->getAlias() . '.sandbox', $config['sandbox']);
        $container->setParameter($this->getAlias() . '.verification_url', $verificationUrl);
    }
}
