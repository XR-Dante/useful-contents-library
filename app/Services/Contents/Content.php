<?php

declare(strict_types=1);

namespace App\Services\Contents;


class Content
{
    public function all(){
        return \App\Models\Content::all();
    }
}
