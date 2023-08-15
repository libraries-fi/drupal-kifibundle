<?php

namespace Drupal\kifibundle\EventSubscriber;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\EventSubscriber\ExceptionLoggingSubscriber;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;

class ConfigurableExceptionLogger extends ExceptionLoggingSubscriber {
  protected $config;

  public function __construct(LoggerChannelFactoryInterface $logger, ConfigFactoryInterface $config) {
    parent::__construct($logger);

    $this->config = $config->get('kifibundle.logging');
  }

  public function on403(ExceptionEvent $event) {
    if ($this->isLoggingEnabled(404)) {
      parent::on403($event);
    }
  }

  public function on404(ExceptionEvent $event) {
    if ($this->isLoggingEnabled(404)) {
      parent::on404($event);
    }
  }

  protected function isLoggingEnabled($error_code) {
    $log_errors = $this->config->get('log_errors');
    return in_array($error_code, $log_errors);
  }
}
