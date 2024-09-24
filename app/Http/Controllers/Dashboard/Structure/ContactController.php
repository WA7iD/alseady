<?php

namespace App\Http\Controllers\Dashboard\Structure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController  extends StructureController
{
    protected string $contentKey = 'contact';
    protected array $locales = ['en', 'ar'];

    protected function store(Request $request)
    {
        return parent::_store($request);
    }
}
