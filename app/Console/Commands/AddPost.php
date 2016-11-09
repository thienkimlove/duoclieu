<?php

namespace App\Console\Commands;

use App\Category;
use App\Post;
use App\Product;
use App\Video;
use Illuminate\Console\Command;

class AddPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Example Post';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            for ($i = 0; $i < 4; $i ++) {
                Post::create([
                    'title' => 'Kê huyết đằng, những công dụng tuyệt vời '.$i,
                    'seo_title' => 'Kê huyết đằng, những công dụng tuyệt vời '.$i,
                    'name' => 'Kê huyết đằng '.$i,
                    's_name' => 'Biologies'.$i,
                    'desc' => 'Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm.Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm',
                    'content' => 'Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm. Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm',
                    'image' => 'bb1246defc1f330b6903be9aba0073fa.jpg',
                    'status' => true,
                    'views' => 5,
                    'category_id' => $category->id
                ]);
            }
        }


        //video.
        for ($i = 0; $i < 4; $i ++) {
            Video::create([
                'title' => 'Kê huyết đằng, những công dụng tuyệt vời - video - '.$i,
                'seo_title' => 'Kê huyết đằng, những công dụng tuyệt vời - video - '.$i,
                'desc' => 'Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm.Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm',
                'content' => 'Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm. Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm',
                'image' => 'bb1246defc1f330b6903be9aba0073fa.jpg',
                'status' => true,
                'views' => 5,
                'url' => 'https://www.youtube.com/embed/2PmqGCOID6g?rel=0&autoplay=1'
            ]);
        }

        for ($i = 0; $i < 4; $i ++) {
            Product::create([
                'title' => 'Kê huyết đằng, những công dụng tuyệt vời - product - '.$i,
                'seo_title' => 'Kê huyết đằng, những công dụng tuyệt vời - product - '.$i,
                'desc' => 'Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm.Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm',
                'content' => 'Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm. Không nên kiêng khem khi cho con ăn dặm Không nên kiêng khem khi cho con ăn dặm',
                'image' => 'bb1246defc1f330b6903be9aba0073fa.jpg',
                'status' => true,
                'views' => 5
            ]);
        }
    }
}
