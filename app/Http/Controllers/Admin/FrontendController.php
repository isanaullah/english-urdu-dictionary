<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogArticle;
use App\Models\Page;
use App\Models\Words;
use App\Models\Meanings;
use App\Models\WordNotFound;
use App\Models\WordsTypes;
use App\Models\UrduDictionary;
use App\Models\WebSetting;
use App\Models\User;
use Illuminate\Http\Request;
//For Schema
use Spatie\SchemaOrg\Schema;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools; // Complete SEO tool for flexibility
class FrontendController extends Controller
{

public function index()
{
    return view();
}

}
