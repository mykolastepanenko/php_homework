<?php

namespace Repositories\Classes;

use Models\Code;
use Repositories\Interfaces\IRepository;

class ARCodeRepository implements IRepository
{

    public function read(): array
    {
        $codes = Code::all()->toArray();
        $arr = [];
        foreach ($codes as $item) {
            $code = $item['code'];
            $url = $item['url'];
            $arr[$code] = $url;
        }
        return $arr;
    }

    public function write(string $url, string $code): void
    {
        $codeModel = new Code();
        $codeModel->code = $code;
        $codeModel->url = $url;
        $codeModel->save();
    }
}