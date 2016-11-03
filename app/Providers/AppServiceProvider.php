<?php

namespace App\Providers;

use App\Banner;
use App\Category;
use App\Post;
use App\Product;
use App\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.header', function ($view) {
            $view->with('headerCategories', Category::where('parent_id', 0)->get());
        });
        view()->composer('*', function ($view) {
            $view->with('siteBanners', Banner::all());
        });

        view()->composer('frontend.right_index', function ($view) {
            $view->with('rightVideos', Video::latest('updated_at')->limit(4)->get());
        });

        view()->composer('frontend.right', function ($view) {
            $view->with('mostReads', Post::where('status', true)->orderBy('views', 'desc')->limit(5)->get());
        });

        view()->composer('frontend.template', function($view){
            $featureProductIds = DB::table('modules')
                ->where('key_content', 'products')
                ->where('key_type', 'feature_index')
                ->pluck('key_value')
                ->all();

            if ($featureProductIds) {
                $featureProducts = Product::whereIn('id', $featureProductIds)->get();
            } else{
                $featureProducts = null;
            }

            $medicineCategoryIds =  DB::table('modules')
                ->where('key_content', 'categories')
                ->where('key_type', 'is_medicine')
                ->pluck('key_value')
                ->all();

            $diseaseCategoryIds =  DB::table('modules')
                ->where('key_content', 'categories')
                ->where('key_type', 'is_disease')
                ->pluck('key_value')
                ->all();

            if ($medicineCategoryIds) {
                $medicineCategories = Category::whereIn('id', $medicineCategoryIds)->first();
            } else{
                $medicineCategories = null;
            }

            if ($diseaseCategoryIds) {
                $diseaseCategories = Category::whereIn('id', $diseaseCategoryIds)->first();
            } else{
                $diseaseCategories = null;
            }

            $view->with('featureProducts', $featureProducts);
            $view->with('medicineCategories', $medicineCategories);
            $view->with('diseaseCategories', $diseaseCategories);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
