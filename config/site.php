<?php

return [
    'content' => [
        'posts' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Title',
                    'value' => 'title',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Seo Title',
                    'value' => 'seo_title',
                    'type' => 'string',
                    'display' => false, //do not display in list.
                    'edit' => true
                ],
                [
                    'name' => 'Description',
                    'value' => 'desc',
                    'type' => 'text',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Keywords',
                    'value' => 'keywords',
                    'type' => 'text',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Content',
                    'value' => 'content',
                    'type' => 'editor',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Image',
                    'value' => 'image',
                    'type' => 'image',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Status',
                    'value' => 'status',
                    'type' => 'boolean',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Views',
                    'value' => 'views',
                    'type' => 'integer',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Category',
                    'value' => 'category',
                    'type' => 'relation',
                    'sub_value' => 'title', //access to relationship field
                    'edit_value' => 'category_id', //using for edit.
                    'relation_list' => 'category_list',  //function at this model to get category list.
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Tags',
                    'value' => 'tag_list',
                    'type' => 'tag',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Name',
                    'value' => 'name',
                    'type' => 'string',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Ten Khoa Hoc',
                    'value' => 's_name',
                    'type' => 'string',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Loại Bệnh',
                    'value' => 'disease',
                    'type' => 'special',
                    'edit_value' => 'disease', //using for edit.
                    'relation_list' => 'disease_list',  //function at this model to get category list.
                    'display' => false,
                    'edit' => true
                ],
            ],
            'modules' => [
                'hot_in_category' => 'Hot Chuyên mục',
                'is_most_read' => 'Most Read Category',
                'is_latest_news' => 'Latest Category',
                'show_on_index' => 'Hiện Ngoài Trang Chủ',
            ]
        ],
        'categories' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Title',
                    'value' => 'title',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Seo Title',
                    'value' => 'seo_title',
                    'type' => 'string',
                    'display' => false, //do not display in list.
                    'edit' => true
                ],
                [
                    'name' => 'Description',
                    'value' => 'desc',
                    'type' => 'text',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Keywords',
                    'value' => 'keywords',
                    'type' => 'text',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Parent',
                    'value' => 'parent',
                    'type' => 'relation',
                    'sub_value' => 'title',
                    'edit_value' => 'parent_id', //using for edit.
                    'relation_list' => 'parent_list',  //function at this model to get category list.
                    'display' => true,
                    'edit' => true
                ]
            ],
            'modules' => [
                'first_block_index' => 'Hiển thị Block1 Trang Chủ',
                'second_block_index' => 'Hiển thị Block1 Trang Chủ',
                'is_medicine' => 'Chuyên mục Dược Liệu',
                'is_disease' => 'Chuyên mục Bệnh',
                'is_special_layout' => 'Layout Đặc biệt',
            ]
        ],
        'banners' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'URL',
                    'value' => 'url',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Image',
                    'value' => 'image',
                    'type' => 'image',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Position',
                    'value' => 'position',
                    'type' => 'relation',
                    'sub_value' => 'name', //access to relationship field
                    'edit_value' => 'position_id', //using for edit.
                    'relation_list' => 'position_list',  //function at this model to get category list.
                    'display' => true,
                    'edit' => true
                ],
            ],
        ],
        'questions' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Title',
                    'value' => 'title',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Seo Title',
                    'value' => 'seo_title',
                    'type' => 'string',
                    'display' => false, //do not display in list.
                    'edit' => true
                ],
                [
                    'name' => 'Description',
                    'value' => 'desc',
                    'type' => 'text',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Keywords',
                    'value' => 'keywords',
                    'type' => 'text',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Content',
                    'value' => 'content',
                    'type' => 'editor',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Image',
                    'value' => 'image',
                    'type' => 'image',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Status',
                    'value' => 'status',
                    'type' => 'boolean',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Views',
                    'value' => 'views',
                    'type' => 'integer',
                    'display' => true,
                    'edit' => false
                ],

                [
                    'name' => 'Question',
                    'value' => 'question',
                    'type' => 'text',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Answer',
                    'value' => 'answer',
                    'type' => 'text',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Ask Person',
                    'value' => 'ask_person',
                    'type' => 'string',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Answer Person',
                    'value' => 'answer_person',
                    'type' => 'string',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Ask Address',
                    'value' => 'ask_address',
                    'type' => 'string',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Ask Phone',
                    'value' => 'ask_phone',
                    'type' => 'string',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Ask Email',
                    'value' => 'ask_email',
                    'type' => 'string',
                    'display' => false,
                    'edit' => true
                ],
            ],
        ],
        'tags' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Title',
                    'value' => 'title',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],

            ],
        ],
        'comments' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Title',
                    'value' => 'title',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Seo Title',
                    'value' => 'seo_title',
                    'type' => 'string',
                    'display' => false, //do not display in list.
                    'edit' => true
                ],
                [
                    'name' => 'Description',
                    'value' => 'desc',
                    'type' => 'text',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Keywords',
                    'value' => 'keywords',
                    'type' => 'text',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Content',
                    'value' => 'content',
                    'type' => 'editor',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Image',
                    'value' => 'image',
                    'type' => 'image',
                    'display' => false,
                    'edit' => false
                ],
                [
                    'name' => 'Status',
                    'value' => 'status',
                    'type' => 'boolean',
                    'display' => false,
                    'edit' => false
                ],
                [
                    'name' => 'Avatar',
                    'value' => 'avatar',
                    'type' => 'image',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Views',
                    'value' => 'views',
                    'type' => 'integer',
                    'display' => false,
                    'edit' => false
                ],
                [
                    'name' => 'Gender',
                    'value' => 'gender',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Person',
                    'value' => 'person',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Address',
                    'value' => 'address',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
            ],
        ],
        'videos' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Title',
                    'value' => 'title',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Seo Title',
                    'value' => 'seo_title',
                    'type' => 'string',
                    'display' => false, //do not display in list.
                    'edit' => true
                ],
                [
                    'name' => 'Description',
                    'value' => 'desc',
                    'type' => 'text',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Keywords',
                    'value' => 'keywords',
                    'type' => 'text',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Content',
                    'value' => 'content',
                    'type' => 'editor',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Image',
                    'value' => 'image',
                    'type' => 'image',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Status',
                    'value' => 'status',
                    'type' => 'boolean',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Views',
                    'value' => 'views',
                    'type' => 'integer',
                    'display' => true,
                    'edit' => false
                ],

                [
                    'name' => 'Url',
                    'value' => 'url',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],

            ],
        ],
        'products' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Title',
                    'value' => 'title',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Seo Title',
                    'value' => 'seo_title',
                    'type' => 'string',
                    'display' => false, //do not display in list.
                    'edit' => true
                ],
                [
                    'name' => 'Link',
                    'value' => 'link',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Description',
                    'value' => 'desc',
                    'type' => 'text',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Keywords',
                    'value' => 'keywords',
                    'type' => 'text',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Content',
                    'value' => 'content',
                    'type' => 'editor',
                    'display' => false,
                    'edit' => false
                ],
                [
                    'name' => 'Image',
                    'value' => 'image',
                    'type' => 'image',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Status',
                    'value' => 'status',
                    'type' => 'boolean',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Views',
                    'value' => 'views',
                    'type' => 'integer',
                    'display' => false,
                    'edit' => false
                ],

                [
                    'name' => 'Content Tab 1',
                    'value' => 'content_tab1',
                    'type' => 'text',
                    'display' => false,
                    'edit' => false
                ],

                [
                    'name' => 'Content Tab 2',
                    'value' => 'content_tab2',
                    'type' => 'text',
                    'display' => false,
                    'edit' => false
                ],

                [
                    'name' => 'Content Tab 3',
                    'value' => 'content_tab3',
                    'type' => 'text',
                    'display' => false,
                    'edit' => false
                ],



            ],
            'modules' => [
                'feature_index' => 'Hiện thị Trang Chủ'
            ]
        ],
        'deliveries' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Title',
                    'value' => 'title',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Seo Title',
                    'value' => 'seo_title',
                    'type' => 'string',
                    'display' => false, //do not display in list.
                    'edit' => true
                ],
                [
                    'name' => 'Description',
                    'value' => 'desc',
                    'type' => 'text',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Keywords',
                    'value' => 'keywords',
                    'type' => 'text',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Content',
                    'value' => 'content',
                    'type' => 'editor',
                    'display' => false,
                    'edit' => true
                ],
                [
                    'name' => 'Image',
                    'value' => 'image',
                    'type' => 'image',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Status',
                    'value' => 'status',
                    'type' => 'boolean',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Views',
                    'value' => 'views',
                    'type' => 'integer',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'City',
                    'value' => 'city',
                    'type' => 'config',
                    'sub_value' => 'city_display',
                    'relation_list' => 'city_list',  //function at this model to get category list.
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Area',
                    'value' => 'area',
                    'type' => 'config',
                    'sub_value' => 'area_display',
                    'relation_list' => 'area_list',  //function at this model to get category list.
                    'display' => true,
                    'edit' => true
                ],
            ],
        ],
        'modules' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Key Name',
                    'value' => 'key_name',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Key Value',
                    'value' => 'key_value',
                    'type' => 'text',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Key Type',
                    'value' => 'key_type',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
                [
                    'name' => 'Key Content',
                    'value' => 'key_content',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
            ],
        ],
        'positions' => [
            'fields' => [
                [
                    'name' => 'ID',
                    'value' => 'id',
                    'type' => 'primary',
                    'display' => true,
                    'edit' => false
                ],
                [
                    'name' => 'Name',
                    'value' => 'name',
                    'type' => 'string',
                    'display' => true,
                    'edit' => true
                ],
            ],
        ],
    ],
    'users' => [
        'manhquan.do@ved.com.vn' => 'admin',
        'truongkien1511@gmail.com' => 'admin',
        'linhptk@tuelinh.com' => 'admin',
        'hongvt@tuelinh.com' => 'admin',
        'quynhltt@tuelinh.com' => 'admin',
        'hienttd@tuelinh.com' => 'admin',
        'thankieumy@gmail.com' => 'admin',
        'huylc@tuelinh.com' => 'admin',
        'maintt@tuelinh.com' => 'admin',
        'annt@tuelinh.com' => 'admin',
		'minhnt@tuelinh.com' => 'admin',
		'ngocanh271198@gmail.com' => 'admin',
		'annghiem88@gmail.com' => 'admin',
		'tunt@caia.vn' => 'admin',
		'hungth@caia.vn' => 'admin',
		'phuongnd@caia.vn' => 'admin',
		'trangth@caia.vn' => 'admin',

        'test@example.com' => 'editor'
    ],
    'permission' => [
        'admin' => 'all',
        'editor' => 'posts, categories'
    ],
    'item_per_page' => 10
];