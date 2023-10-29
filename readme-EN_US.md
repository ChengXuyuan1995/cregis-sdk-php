# cregis-sdk-php

## Installation
### Method 1: Command-line installation
```php
composer require udun/cregis-sdk-php
```

### Method 2: Installation via composer configuration
1. Add the following configuration to your composer.json file:
```php
{
    "require": {
        "udun/cregis-sdk-php": "^1.0"
    }
}
```

2. Run the command:
```
composer install
```

## Usage

1. Create CregisController.php file:
```php
use Cregis\Dispatch\CregisDispatch;

class CregisController {
    protected $cregisDispatch;

    public function __construct() {
        // Controller initialization
        $this->initialize();
    }

    protected function initialize() {
        $this->cregisDispatch = new CregisDispatch([
            'project_no' => 138XXXXXXXXXXX6576,  // Project number
            'api_key' => 'XXXXXXXXXXXXXXXXXXXXXx',  // API key
            'endpoint'=> 'https://xxxxxx.xxxxxx.xxx',  // Node address
            'callUrl'=> 'https://localhost/callUrl'  // Recharge callback URL
        ]);
    }
}
```

2. In the class where you need to use the API, extend CregisController:

```php
## Example of usage
namespace xxxx;

class Index extends CregisController {
    $project_no = 11112222;

    // Get the supported currencies of the project
    public function coinslist() {
        $result =  $this->cregisDispatch->coinslist($project_no);
        return json($result);
    }

    // Create an address: Parameters - project number, currency code, alias, callback URL
    public function createAddress() {
        $result =  $this->cregisDispatch->createAddress($project_no, 60, 'test01', $callUrl);
        return json($result);
    }

    // Check the validity of an address: Parameters - project number, currency code, address
    public function addressLegal() {
        $result =  $this->cregisDispatch->addressLegal($project_no, 60, '0x8fabec737e3e724f1fc4537da44f84029c7879b9');
        return json($result);
    }

    // Check if an address exists: Parameters - project number, currency code, address
    public function addressInner() {
        $result =  $this->cregisDispatch->addressInner($project_no, 60, '0x8fabec737e3e724f1fc4537da44f84029c7879b9');
        return json($result);
    }

    // Apply for a withdrawal: Parameters - project number, currency code, address, amount, withdrawal callback URL, business reference number, note
    public function withdraw() {
        $result =  $this->cregisDispatch->payout($project_no, '60@60', '0x8fabec737e3e724f1fc4537da44f84029c7879b9', 0.05, $callUrl, "OR" . time(), 'Note');
        return json($result);
    }

    // Query a withdrawal: Parameters - project number, order number
    public function payoutQuery() {
        $result =  $this->cregisDispatch->payoutQuery($project_no, 1390260293664768);
        return json($result);
    }

    // Handle recharge transaction callback (Customize as per business requirements)
    public function changeBackUrl() {
        $result =  $this->cregisDispatch->changeBackUrl();
        return json($result);
    } 

    // Handle withdrawal transaction callback (Customize as per business requirements)
    public function withdrawalBackUrl() {
        $result =  $this->cregisDispatch->withdrawalBackUrl();
        return json($result);
    } 
}
```

## Others
```
##curl: (35) OpenSSL SSL_connect: SSL_ERROR_SYSCALL in connection to raw.githubusercontent.com:443
If you encounter the above error, you need to add a CA certificate.

##Enable SSL in php.ini
extension=php_openssl.dll;

##Certificate path
openssl.cafile=D:\cacert.pem
```