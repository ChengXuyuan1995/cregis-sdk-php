# cregis-sdk-php
cregis-sdk-php

## 安装
### 方式1：命令安装
```php
	composer require udun/cregis-sdk-php
```

### 方式2：composer 配置安装
1,在composer.json添加如下配置
```php
{
	"require":{
		"udun/cregis-sdk-php": "^1.0"
	}
}
```

2,执行命令
```
	composer install
```

## 使用

1,新建CregisController.php 
```
	use Cregis\Dispatch\CregisDispatch;

	class CregisController{
		protected $cregisDispatch ;
		public function __construct()
	    {
	       	// 控制器初始化
	       	$this->initialize();
	    }
	    protected function initialize(){
	    	$this->cregisDispatch = new CregisDispatch([
            'project_no' => 138XXXXXXXXXXX6576,  //项目编号
            'api_key' => 'XXXXXXXXXXXXXXXXXXXXXx',  //apikey
            'endpoint'=>'https://xxxxxx.xxxxxx.xxx',  // 节点地址
            'callUrl'=>'https://localhost/callUrl'  //充值回调url
        ]);
	    }
	}
```
2,在需要使用到接口的类继承 CregisController

```
	##使用示例
	namespace xxxx;
	class Index extends CregisController{
		$project_no = 11112222
		//查询项目支持的币种
		public function coinslist()
	    {

	    	$result =  $this->cregisDispatch->coinslist($project_no);
	        return json($result);
	    }


	    //创建地址  参数: 项目编号，币种码，别名，回调url
		public function createAddress()
	    {
	    	$result =  $this->cregisDispatch->createAddress($project_no,60,'test01',$callUrl);
	        return json($result);
	    }

	    //验证地址合法性  参数: 项目编号，币种码，地址
		public function addressLegal()
	    {
	    	$result =  $this->cregisDispatch->addressLegal($project_no,60,'0x8fabec737e3e724f1fc4537da44f84029c7879b9');
	        return json($result);
	    }

	    //查询地址是否存在 参数: 项目编号，币种码，地址
		public function addressInner()
	    {
	    	$result =  $this->cregisDispatch->addressInner($project_no,60,'0x8fabec737e3e724f1fc4537da44f84029c7879b9');
	        return json($result);
	    }

	    //申请提币  参数: 项目编号，币种码，地址，数量，提币回调url，业务方业务编号，备注
		public function withdraw()
	    {
	    	$result =  $this->cregisDispatch->payout($project_no,'60@60','0x8fabec737e3e724f1fc4537da44f84029c7879b9',0.05,$callUrl,"OR".time(),'备注');
	        return json($result);
	    }

	    //查询提币  参数：项目编号，订单编号
		public function payoutQuery()
	    {
	    	$result =  $this->cregisDispatch->payoutQuery($project_no,1390260293664768);
	        return json($result);
	    }


	    //充值交易回调处理  需要根据业务自行修改
		public function changeBackUrl()
	    {
	    	$result =  $this->cregisDispatch->changeBackUrl();
	        return json($result);
	    } 
	    //提币交易回调处理  需要根据业务自行修改
		public function withdrawalBackUrl()
	    {
	    	$result =  $this->cregisDispatch->withdrawalBackUrl();
	        return json($result);
	    } 

	}
```


## 其他

```
##curl: (35) OpenSSL SSL_connect: SSL_ERROR_SYSCALL in connection to raw.githubusercontent.com:443
如果提示以上错误需要添加ca证书
##php.ini  打开ssl
extension=php_openssl.dll;
##证书路径
openssl.cafile=D:\cacert.pem
```