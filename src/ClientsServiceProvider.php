<?php

namespace Cregis\Dispatch;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ClientsServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['clients'] = function ($pimple) {
            return new Clients($pimple['config']->get('project_no'), $pimple['config']->get('api_key'), $pimple['config']->get('endpoint'), $pimple['config']->get('callUrl'));
        };
    }
}