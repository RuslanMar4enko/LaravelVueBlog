<?php

namespace App\Http\Controllers\Admin;

use App\Language;
use App\Facades\CRUD;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;

class LanguageController extends Controller
{
  /**
   * @param Language $language
   * @return mixed
   */
  public function index(Language $language)
  {
    return $language->latest()->get();
  }

  /**
   * @param Language $language
   * @param LanguageRequest $request
   * @return mixed
   */
  public function saveLang(Language $language, LanguageRequest $request)
  {
    return CRUD::store($language, $request);
  }

  /**
   * @param Language $language
   * @param LanguageRequest $request
   * @param $id
   * @return mixed
   */
  public function editLang(Language $language, LanguageRequest $request, $id)
  {
    return CRUD::update($language, $request, $id);
  }

  /**
   * @param Language $language
   * @param $id
   * @return mixed
   */
  public function deleteLang(Language $language, $id)
  {
    return CRUD::delete($language, $id);
  }
}
