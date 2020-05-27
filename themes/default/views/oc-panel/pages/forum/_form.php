<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
                <?=FORM::label('name', __('Name'), ['class' => 'block text-sm font-medium leading-5 text-gray-700', 'for' => 'name'])?>
                <?=FORM::input('name', $forum->name, ['placeholder' => __('Name'), 'class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5', 'required'])?>
            </div>
            <div class="col-span-3 sm:col-span-2">
                <?=FORM::label('id_forum_parent', __('Parent forum'), ['class'=>'block text-sm leading-5 font-medium text-gray-700', 'for'=>'id_forum_parent'])?>
                <div class="rounded-md shadow-sm">
                    <?= FORM::select('id_forum_parent', $parent_forums, $forum->id_forum_parent, ['class' => 'mt-1 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5'])?>
                </div>
            </div>
            <div class="col-span-3">
                <?=FORM::label('description', __('Description'), ['class'=>'block text-sm leading-5 font-medium text-gray-700', 'for'=>'description'])?>
                <div class="rounded-md shadow-sm">
                    <?=FORM::textarea('description', $forum->description, ['class'=>'form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5','data-editor'=>'html', 'placeholder'=>__('Description')])?>
                </div>
            </div>
            <div class="col-span-3 sm:col-span-2">
                <?=FORM::label('seoname', __('SEO name'), ['class' => 'block text-sm font-medium leading-5 text-gray-700', 'for' => 'seoname'])?>
                <?=FORM::input('seoname', $forum->seoname, ['placeholder' => __('SEO title'), 'class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5'])?>
            </div>
        </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <div class="flex justify-end">
            <span class="inline-flex rounded-md shadow-sm">
                <a href="<?= Route::url('oc-panel/addons', ['controller' => 'forums']) ?>" role="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    <?= __('Cancel') ?>
                </a>
            </span>
            <span class="ml-3 inline-flex rounded-md shadow-sm">
                <?=FORM::button('submit', __('Save'), ['type'=>'submit', 'class'=>'inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out'])?>
            </span>
        </div>
    </div>
</div>
