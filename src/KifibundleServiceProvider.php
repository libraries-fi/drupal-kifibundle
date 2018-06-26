<?php

namespace Drupal\kifibundle;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\kifibundle\EventSubscriber\ConfigurableExceptionLogger;
use Symfony\Component\DependencyInjection\Reference;

class KifibundleServiceProvider extends ServiceProviderBase {
  public function alter(ContainerBuilder $container) {
    $definition = $container->getDefinition('exception.logger');
    $definition->setClass(ConfigurableExceptionLogger::class);
    $definition->addArgument(new Reference('config.factory'));
  }
}
