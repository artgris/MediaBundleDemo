<?php


namespace App\Service;


use Artgris\Bundle\FileManagerBundle\Service\CustomConfServiceInterface;

class CustomService implements CustomConfServiceInterface
{
    public function getConf($extra = [])
    {
        return [
            'dir' => '../public/uploads/custom/',
            'type' => 'image',
            'upload' => [
                'max_file_size' => 5242880 # 5mo
            ]
        ];
    }
}