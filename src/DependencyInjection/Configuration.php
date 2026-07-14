<?php declare(strict_types = 1);

namespace OpenDxp\Bundle\QrcodeBundle\DependencyInjection;

use OpenDxp\Bundle\CoreBundle\DependencyInjection\ConfigurationHelper;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('opendxp_qrcode');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->arrayNode('codes')
                    ->normalizeKeys(false)
                    ->prototype('array')
                        ->children()
                            ->scalarNode('name')->end()
                            ->scalarNode('description')->end()
                            ->scalarNode('url')->end()
                            ->integerNode('modificationDate')->end()
                            ->integerNode('creationDate')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        /** @var ArrayNodeDefinition $rootNode */
        ConfigurationHelper::addConfigLocationWithWriteTargetNodes(
            $rootNode,
            ['qrcode' => OPENDXP_CONFIGURATION_DIRECTORY . '/qrcode']
        );

        return $treeBuilder;
    }
}
