<?php

namespace App\Messenger;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

class MessengerConfig
{
    public function configure(ContainerConfigurator $configurator): void
    {
        $services = $configurator->services();
        
        // Configuration pour utiliser un transport synchrone pour le mailer
        $services->alias('messenger.transport.async', 'messenger.transport.sync');
    }
} 