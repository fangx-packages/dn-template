<?php

declare(strict_types=1);

/**
 * Fangx's Packages
 *
 * @link     https://nfangxu.com
 * @document https://pkg.nfangxu.com
 * @contact  nfangxu@gmail.com
 * @author   nfangxu
 * @license  https://pkg.nfangxu.com/license
 */

namespace Fangx\DnTemplate;

if (class_exists(\Illuminate\Support\ServiceProvider::class)) {
    class ServiceProvider extends \Illuminate\Support\ServiceProvider
    {
        public function boot()
        {
        }

        public function register()
        {
        }
    }
} else {
    class ServiceProvider
    {
    }
}
