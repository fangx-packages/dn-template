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
            $this->loadViewsFrom(__DIR__ . '/../resources/', 'dn-template');

            $this->publishes([
                __DIR__ . '/../publish' => public_path('dn-template'),
            ], 'dn-template');
        }

        public function register()
        {
        }
    }
} else {
    class ServiceProvider
    {
        public function __invoke(): array
        {
            return [
                'view' => [
                    'namespaces' => [
                        'dn-template' => __DIR__ . '/../resources/',
                    ],
                ],
                'publish' => [
                    [
                        'id' => 'dn-template',
                        'description' => 'The DN-Template demo files.',
                        'source' => __DIR__ . '/../publish',
                        'destination' => BASE_PATH . '/public/dn-template',
                    ],
                ],
            ];
        }
    }
}
