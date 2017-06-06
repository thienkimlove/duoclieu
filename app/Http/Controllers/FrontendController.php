<?php
/**
 * Created by PhpStorm.
 * User: quandm
 * Date: 11/7/2016
 * Time: 3:30 PM
 */

namespace App\Http\Controllers;


use App\Category;
use App\Comment;
use App\Delivery;
use App\Post;
use App\Product;
use App\Question;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{

    protected function generateMeta($case = null, $meta = [], $mainContent = null)
    {
        $defaultLogo = url(env('LOGO_URL'));
        switch ($case) {
            default :
                return [
                    'meta_title' => env('META_INDEX_TITLE'),
                    'meta_desc' => env('META_INDEX_DESC'),
                    'meta_keywords' => env('META_INDEX_KEYWORD'),
                    'meta_url' => url('/'),
                    'meta_image' => $defaultLogo
                ];
                break;

            case 'lien-he' :
                return [
                    'meta_title' => env('META_CONTACT_TITLE'),
                    'meta_desc' => env('META_CONTACT_DESC'),
                    'meta_keywords' => env('META_CONTACT_KEYWORD'),
                    'meta_url' => url('lien-he'),
                    'meta_image' => $defaultLogo
                ];
                break;
            case 'video' :

                return [
                    'meta_title' => !empty($meta['title']) ? $meta['title'] : env('META_VIDEO_TITLE'),
                    'meta_desc' => empty($meta['desc']) ? $meta['desc'] : env('META_VIDEO_DESC'),
                    'meta_keywords' => empty($meta['keywords']) ? $meta['keywords'] : env('META_VIDEO_KEYWORD'),
                    'meta_url' => ($mainContent) ? url('video/' . $mainContent->slug) : url('video'),
                    'meta_image' => ($mainContent)?  url('img/cache/120x120/'.$mainContent->image) : $defaultLogo
                ];

                break;
            case 'phan-phoi' :
                return [
                    'meta_title' => !empty($meta['title']) ? $meta['title'] : env('META_DELIVERY_TITLE'),
                    'meta_desc' => empty($meta['desc']) ? $meta['desc'] : env('META_DELIVERY_DESC'),
                    'meta_keywords' => empty($meta['keywords']) ? $meta['keywords'] : env('META_DELIVERY_KEYWORD'),
                    'meta_url' => ($mainContent) ? url('phan-phoi/' . $mainContent->id) : url('phan-phoi'),
                    'meta_image' => $defaultLogo
                ];

                break;

            case 'product' :

                return [
                    'meta_title' => !empty($meta['title']) ? $meta['title'] : env('META_PRODUCT_TITLE'),
                    'meta_desc' => empty($meta['desc']) ? $meta['desc'] : env('META_PRODUCT_DESC'),
                    'meta_keywords' => empty($meta['keywords']) ? $meta['keywords'] : env('META_PRODUCT_KEYWORD'),
                    'meta_url' => ($mainContent) ? url('product/' . $mainContent->slug) : url('product'),
                    'meta_image' => ($mainContent)?  url('img/cache/120x120/'.$mainContent->image) : $defaultLogo
                ];

            case 'tag' :
                return [
                    'meta_title' => $meta['title'],
                    'meta_desc' => $meta['desc'],
                    'meta_keywords' => $meta['keywords'],
                    'meta_url' => url('tag/' . $mainContent),
                    'meta_image' => $defaultLogo
                ];
                break;

            case 'hoi-dap' :
                return [
                    'meta_title' => !empty($meta['title']) ? $meta['title'] : env('META_QUESTION_TITLE'),
                    'meta_desc' => empty($meta['desc']) ? $meta['desc'] : env('META_QUESTION_DESC'),
                    'meta_keywords' => empty($meta['keywords']) ? $meta['keywords'] : env('META_QUESTION_KEYWORD'),
                    'meta_url' => ($mainContent) ? url('hoi-dap/' . $mainContent->slug) : url('hoi-dap'),
                    'meta_image' => ($mainContent)?  url('img/cache/120x120/'.$mainContent->image) : $defaultLogo
                ];
                break;
            case 'post' :
                return [
                    'meta_title' => $meta['title'],
                    'meta_desc' => $meta['desc'],
                    'meta_keywords' => $meta['keywords'],
                    'meta_url' => url($mainContent->slug . '.html'),
                    'meta_image' => url('img/cache/120x120/'.$mainContent->image)
                ];
                break;
            case 'category' :
                return [
                    'meta_title' => $meta['title'],
                    'meta_desc' => $meta['desc'],
                    'meta_keywords' =>  $meta['keywords'] ,
                    'meta_url' => url($mainContent->slug),
                    'meta_image' => $defaultLogo
                ];
                break;
        }

    }

    public function index()
    {
        $page = 'index';

        $page_css = 'home';

        $indexBlock1CategoryIds = DB::table('modules')
            ->where('key_content', 'categories')
            ->where('key_type', 'first_block_index')
            ->pluck('key_value')
            ->all();

        $indexBlock2CategoryIds = DB::table('modules')
            ->where('key_content', 'categories')
            ->where('key_type', 'second_block_index')
            ->pluck('key_value')
            ->all();

        if ($indexBlock1CategoryIds) {
            $indexBlock1Categories = Category::whereIn('id', $indexBlock1CategoryIds)->get();
        } else{
            $indexBlock1Categories = null;
        }

        if ($indexBlock2CategoryIds) {
            $indexBlock2Categories = Category::whereIn('id', $indexBlock2CategoryIds)->get();
        } else{
            $indexBlock2Categories = null;
        }


        $indexQuestions = Question::latest('updated_at')->limit(5)->get();

        $comments = Comment::paginate(4);

        return view('frontend.index', compact(
            'page',
            'indexBlock1Categories',
            'indexBlock2Categories',
            'indexQuestions',
            'comments',
            'page_css'
        ))->with($this->generateMeta());
    }

    public function contact()
    {
        $page = 'lien-he';

        $page_css = 'lienhe';

        return view('frontend.contact', compact('page', 'page_css'))->with($this->generateMeta('lien-he'));
    }

    public function video($value = null)
    {
        $page = 'video';
        $page_css = 'video';
        $mainVideo = null;
        $meta_title = $meta_desc = $meta_keywords = null;
        $videos = Video::latest('created_at')->paginate(12);

        if ($videos->count() > 0) {
            $mainVideo = $videos->first();
        }

        if ($value) {
            $mainVideo = Video::where('slug', $value)->first();
            $meta_title = ($mainVideo->seo_title) ? $mainVideo->seo_title : $mainVideo->title;
            $meta_desc = $mainVideo->desc;
            $meta_keywords = $mainVideo->keywords;
            $mainVideo->update(['views' => (int)$mainVideo->views + 1]);
        }


        return view('frontend.video', compact('videos', 'mainVideo', 'page', 'page_css'))->with($this->generateMeta('video', [
            'title' => $meta_title,
            'desc' => $meta_desc,
            'keywords' => $meta_keywords,
        ], $mainVideo));

    }

    public function delivery($value = null)
    {
        $page = 'phan-phoi';
        $meta_title = $meta_desc = $meta_keywords = null;
        if ($value) {
            $delivery = Delivery::find($value);
            $meta_title = $delivery->seo_title;
            $meta_desc = $delivery->desc;
            $meta_keywords = $delivery->keywords;

            $page_css = 'chitiet';

            return view('frontend.detail_delivery', compact('delivery', 'page', 'page_css'))->with($this->generateMeta('phan-phoi', [
                'title' => $meta_title,
                'desc' => $meta_desc,
                'keywords' => $meta_keywords,
            ], $delivery));
        } else {
            $totalDeliveries = [];
            $page_css = 'htphanphoi';
            foreach (config('delivery')['area'] as $key => $area) {
                $totalDeliveries[$area] = Delivery::where('area', $key)->get();
            }

            return view('frontend.delivery', compact('totalDeliveries', 'page', 'page_css'))->with($this->generateMeta('phan-phoi', [
                'title' => $meta_title,
                'desc' => $meta_desc,
                'keywords' => $meta_keywords,
            ]));
        }
    }



    public function saveQuestion(Request $request)
    {
        $data = $request->all();

        if (isset($data['question'])) {

            Mail::send('mails.question', ['data' => $data], function ($m)  {
                $m->from(env('MAIL_USERNAME'), 'Tue Linh')
                    ->to('contact@tuelinh.com')
                    ->subject('Đặt câu hỏi với chuyên gia!');
            });

        }

        return redirect(url('/'));
    }

    public function tag($value)
    {
        $page = 'tag';

        $page_css = 'bantinDl';

        $tag = Tag::where('slug', $value)->get();

        if ($tag->count() > 0) {

            $tag = $tag->first();

            $meta_title = ($tag->seo_title) ? $tag->seo_title : $tag->name;
            $meta_desc = $tag->desc;
            $meta_keywords = $tag->keywords;

            $posts = Post::where('status', true)
                ->whereHas('tags', function ($q) use ($tag) {
                    $q->where('id', $tag->id);
                })
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

            return view('frontend.tag', compact('posts', 'tag', 'page', 'page_css'))->with
            ($this->generateMeta([
                'title' => $meta_title,
                'desc' => $meta_desc,
                'keywords' => $meta_keywords,
            ], $value));
        }
    }

    public function search(Request $request)
    {
        $page = 'search';
        $page_css = 'bantinDl';
        if ($request->input('q')) {
            $keyword = $request->input('q');
            $posts = Post::publish()->where('title', 'LIKE', '%' . $keyword . '%')->paginate(10);

            return view('frontend.search', compact('posts', 'keyword', 'page', 'page_css'))->with($this->generateMeta('tag', [
                'title' => 'Tìm kiếm cho từ khóa ' . $keyword,
                'desc' => 'Tìm kiếm cho từ khóa ' . $keyword,
                'keywords' => $keyword,
            ], $keyword));
        }
    }

    public function product($value = null)
    {
        $page = 'product';
        $page_css = 'bantinDl';
        $meta_title = $meta_desc = $meta_keywords = null;
        if ($value) {
            $product = Product::where('slug', $value)->first();
            $meta_title = ($product->seo_title) ? $product->seo_title : $product->title;
            $meta_desc = $product->desc;
            $meta_keywords = $product->keywords;
            return view('frontend.product_detail', compact(
                'product',
                'page',
                'page_css'
            ))->with($this->generateMeta('product', [
                'title' => $meta_title,
                'desc' => $meta_desc,
                'keywords' => $meta_keywords,
            ], $product));
        } else {

            $products = Product::paginate(9);

            return view('frontend.product', compact('products', 'page'))->with($this->generateMeta('product', [
                'title' => $meta_title,
                'desc' => $meta_desc,
                'keywords' => $meta_keywords,
            ]));
        }

    }

    public function question($value = null)
    {
        $page = 'hoi-dap';
        $page_css = 'tuvancg';
        $mainQuestion = null;
        $meta_title = $meta_desc = $meta_keywords = null;
        if ($value) {
            $mainQuestion = Question::where('slug', $value)->first();
            $meta_title = ($mainQuestion->seo_title) ? $mainQuestion->seo_title : $mainQuestion->title;
            $meta_desc = $mainQuestion->desc;
            $meta_keywords = $mainQuestion->keywords;
        }
        $questions = Question::where('status', true)->paginate(10);
        return view('frontend.question', compact('questions', 'mainQuestion', 'page', 'page_css'))->with($this->generateMeta('hoi-dap', [
            'title' => $meta_title,
            'desc' => $meta_desc,
            'keywords' => $meta_keywords,
        ], $mainQuestion));
    }

    public function main($value, Request $request)
    {

        if (preg_match('/([a-z0-9\-]+)\.html/', $value, $matches)) {

            $post = Post::where('slug', $matches[1])->first();
            $post->update(['views' => (int) $post->views + 1]);
            $is_benh = false;
            $page_css = 'chitiet';
            $posts = [];
            if ($post->category->id == 3) {
                $is_benh = true;
                $caythuocListIds =  \App\Content::where('benh_id', $post->id)->pluck('thuoc_id')->all();
                $posts = Post::where('status', true)->latest('updated_at')->whereIn('id', $caythuocListIds)->get();
                $page_css =  'dlcaythuoc';
            }

            $page = $post->category->slug;

            //addmore

            $mostReadIds =  DB::table('modules')
                ->where('key_content', 'posts')
                ->where('key_type', 'is_most_read')
                ->pluck('key_value')
                ->all();

            $latestNewIds =  DB::table('modules')
                ->where('key_content', 'posts')
                ->where('key_type', 'is_latest_news')
                ->pluck('key_value')
                ->all();

            $mostReadInCategory = Post::where('status', true)
                ->where('category_id', $post->category->id)
                ->whereIn('id', $mostReadIds)
                ->latest('updated_at')
                ->limit(5)
                ->get();

            $latestNewInCategory = Post::where('status', true)
                ->where('category_id', $post->category->id)
                ->whereIn('id', $latestNewIds)
                ->latest('updated_at')
                ->limit(5)
                ->get();


            return view('frontend.post', compact('post', 'page', 'page_css', 'is_benh', 'posts', 'mostReadInCategory', 'latestNewInCategory'))->with($this->generateMeta('post', [
                'title' => ($post->seo_title) ? $post->seo_title : $post->title,
                'desc' => $post->desc,
                'keywords' => ($post->tagList) ? implode(',', $post->tagList) : null,
            ], $post));
        } else {

            if ($value == 'duoc-lieu-online') {
                return redirect()->away('http://shop.duoclieutuelinh.vn');
            }

            $category = Category::where('slug', $value)->first();
            $posts = Post::where('status', true);
            $posts = ($category->subCategories->count() == 0)? $posts->where('category_id', $category->id) : $posts->whereIn('category_id', $category->subCategories->pluck('id')->all());

            if ($request->input('sort')) {
                $posts = $posts->where('title', 'like', $request->input('sort').'%');
            }

            if ($request->input('q')) {
                $posts = $posts->where('title', 'like', $request->input('q').'%');
            }

            $posts = $posts->latest('created_at')->paginate(12);
            $page = $category->slug;

            //check if category is disease or medicine or not.

            $specialIds =  DB::table('modules')
                ->where('key_content', 'categories')
                ->where('key_type', 'is_special_layout')
                ->pluck('key_value')
                ->all();

            $view_name = (in_array($category->id, $specialIds)) ? 'frontend.special_category' : 'frontend.normal_category';
            $category_page_type = (in_array($category->id, $specialIds)) ? 'special' : 'normal';

            $page_css = ($category_page_type == 'normal') ? 'bantinDl' : 'dlcaythuoc';

            $hotPostIds =  DB::table('modules')
                ->where('key_content', 'posts')
                ->where('key_type', 'hot_in_category')
                ->pluck('key_value')
                ->all();

            $hotPost = Post::where('status', true)
                ->where('category_id', $category->id)
                ->whereIn('id', $hotPostIds)
                ->latest('updated_at')
                ->limit(1)
                ->get();

            //addmore

            $mostReadIds =  DB::table('modules')
                ->where('key_content', 'posts')
                ->where('key_type', 'is_most_read')
                ->pluck('key_value')
                ->all();

            $latestNewIds =  DB::table('modules')
                ->where('key_content', 'posts')
                ->where('key_type', 'is_latest_news')
                ->pluck('key_value')
                ->all();

            $mostReadInCategory = Post::where('status', true)
                ->where('category_id', $category->id)
                ->whereIn('id', $mostReadIds)
                ->latest('updated_at')
                ->limit(5)
                ->get();

            $latestNewInCategory = Post::where('status', true)
                ->where('category_id', $category->id)
                ->whereIn('id', $latestNewIds)
                ->latest('updated_at')
                ->limit(5)
                ->get();


            return view($view_name, compact(
                'category', 'posts', 'page', 'hotPost', 'category_page_type', 'page_css', 'mostReadInCategory', 'latestNewInCategory'
            ))->with($this->generateMeta('category', [
                'title' => ($category->seo_name) ?  $category->seo_name : $category->name,
                'desc' =>  ($category->desc)? $category->desc : null,
                'keywords' => ($category->keywords)? $category->keywords : null,
            ], $category));
        }
    }


    public function sitemap()
    {
        $posts = Post::where('status', true)->orderBy('updated_at', 'desc')->get();

        return response()->view('sitemap', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }

}