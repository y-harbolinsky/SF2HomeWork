<?php

namespace Blog\NewsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Test\TestBundle\DependencyInjection\Configuration;

class NewsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $containerBuilder)
    {
        $configuration = new Configuration();
        $config = $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($containerBuilder, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}

