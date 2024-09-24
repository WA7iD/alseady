<?php

namespace App\Http\Controllers\Dashboard\Structure;


use Illuminate\Http\Request;

class PrivacyPolicyController extends StructureController
{
    protected string $contentKey = 'privacy-policy';
    protected array $locales = ['en', 'ar'];

    protected function store(Request $request){
        return parent::_store($request);
    }
}
