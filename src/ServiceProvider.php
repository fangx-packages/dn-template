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
            $source = __DIR__ . '/../publish';
            $destination = BASE_PATH . '/public/dn-template';

            $files = (new \Symfony\Component\Finder\Finder())->in($source)->ignoreDotFiles(true)->files();

            $publish = [];

            foreach ($files as $file) {
                /** @var \Symfony\Component\Finder\SplFileInfo $file */
                $filename = sprintf('%s/%s', $source, $file->getRelativePathname());
                $publish[] = [
                    'id' => $filename,
                    'description' => $filename,
                    'source' => $filename,
                    'destination' => sprintf('%s/%s', $destination, $file->getRelativePathname()), // 复制为这个路径下的该文件
                ];
            }

            return [
                'view' => [
                    'namespaces' => [
                        'dn-template' => __DIR__ . '/../resources/',
                    ],
                ],
                'publish' => $publish,
            ];
        }
    }
}
