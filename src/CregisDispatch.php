<?php
namespace Cregis\Dispatch;
use Hanson\Foundation\Foundation;

/**
 * 
 */
class CregisDispatch extends Foundation
{
	
    private $clients;

    protected $providers = [
        ClientsServiceProvider::class
    ];

    public function __construct($config)
    {
        parent::__construct($config);
        $this->clients = new Clients($config['project_no'], $config['api_key'], $config['endpoint'], $config['callUrl']);
    }

    public function __call($name, $arguments)
    {
        return $this->clients->{$name}(...$arguments);
    }
}