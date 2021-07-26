<?php

namespace ZnKaz\Eds;

use ZnCore\Base\Libs\App\Base\BaseBundle;

class Bundle extends BaseBundle
{

    public function console(): array
    {
        return [
            'ZnKaz\Eds\Commands',
        ];
    }
    
    public function migration(): array
    {
        return [
            '/vendor/znkaz/eds/src/Domain/Migrations',
        ];
    }
    
    public function container(): array
    {
        return [
            __DIR__ . '/Domain/config/container.php',
        ];
    }
}
