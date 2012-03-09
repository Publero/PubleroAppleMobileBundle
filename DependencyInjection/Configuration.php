<?php

namespace Publero\AppleMobileBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('publero_apple_mobile');

        $rootNode
            ->children()
                ->scalarNode('store_receipt_class')->isRequired()->end()
                ->scalarNode('sandbox')->defaultTrue()->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}