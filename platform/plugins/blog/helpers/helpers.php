<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Supports\SortItemsWithChildrenHelper;
use Botble\Blog\Repositories\Interfaces\CategoryInterface;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Blog\Repositories\Interfaces\TagInterface;
use Botble\Blog\Supports\PostFormat;
use Illuminate\Support\Arr;

use Botble\Profile\Models\Profile;
use Botble\Slug\Models\Slug;
use Botble\Slidebar\Models\Slidebar;
use Botble\Blog\Models\Post;
use Botble\Tuyensinh\Models\Tuyensinh;
use Botble\Blog\Models\Category;
use Botble\ACL\Models\User;

use Illuminate\Support\Collection;

if (!function_exists('get_featured_posts')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_featured_posts($limit)
    {
        return app(PostInterface::class)->getFeatured($limit);
    }
}

if (!function_exists('get_latest_posts')) {
    /**
     * @param $limit
     * @param array $excepts
     * @return mixed
     *
     */
    function get_latest_posts($limit, $excepts = [])
    {
        return app(PostInterface::class)->getListPostNonInList($excepts, $limit);
    }
}


if (!function_exists('get_related_posts')) {
    /**
     * @param $current_slug
     * @param $limit
     * @return mixed
     *
     */
    function get_related_posts($current_slug, $limit)
    {
        return app(PostInterface::class)->getRelated($current_slug, $limit);
    }
}

if (!function_exists('get_posts_by_category')) {
    /**
     * @param $category_id
     * @param $paginate
     * @param $limit
     * @return mixed
     *
     */
    function get_posts_by_category($category_id, $paginate = 12, $limit = 0)
    {
        return app(PostInterface::class)->getByCategory($category_id, $paginate, $limit);
    }
}

if (!function_exists('get_posts_by_tag')) {
    /**
     * @param $slug
     * @param $paginate
     * @return mixed
     *
     */
    function get_posts_by_tag($slug, $pagiagnate = 12)
    {
        return app(PostInterface::class)->getByTag($slug, $paginate);
    }
}

if (!function_exists('get_posts_by_user')) {
    /**
     * @param $author_id
     * @param $paginate
     * @return mixed
     *
     */
    function get_posts_by_user($author_id, $paginate = 12)
    {
        return app(PostInterface::class)->getByUserId($author_id, $paginate);
    }
}

if (!function_exists('get_all_posts')) {
    /**
     * @param boolean $active
     * @param int $perPage
     * @return mixed
     *
     */
    function get_all_posts($active = true, $perPage = 12)
    {
        return app(PostInterface::class)->getAllPosts($perPage, $active);
    }
}

if (!function_exists('get_recent_posts')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_recent_posts($limit)
    {
        return app(PostInterface::class)->getRecentPosts($limit);
    }
}


if (!function_exists('get_featured_categories')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_featured_categories($limit)
    {
        return app(CategoryInterface::class)->getFeaturedCategories($limit);
    }
}

if (!function_exists('get_all_categories')) {
    /**
     * @param array $condition
     * @return mixed
     *
     */
    function get_all_categories(array $condition = [])
    {
        return app(CategoryInterface::class)->getAllCategories($condition);
    }
}

if (!function_exists('get_all_tags')) {
    /**
     * @param boolean $active
     * @return mixed
     *
     */
    function get_all_tags($active = true)
    {
        return app(TagInterface::class)->getAllTags($active);
    }
}

if (!function_exists('get_popular_tags')) {
    /**
     * @param integer $limit
     * @return mixed
     *
     */
    function get_popular_tags($limit = 10)
    {
        return app(TagInterface::class)->getPopularTags($limit);
    }
}

if (!function_exists('get_popular_posts')) {
    /**
     * @param integer $limit
     * @param array $args
     * @return mixed
     *
     */
    function get_popular_posts($limit = 10, array $args = [])
    {
        return app(PostInterface::class)->getPopularPosts($limit, $args);
    }
}

if (!function_exists('get_category_by_id')) {
    /**
     * @param integer $id
     * @return mixed
     *
     */
    function get_category_by_id($id)
    {
        return app(CategoryInterface::class)->getCategoryById($id);
    }
}

if (!function_exists('get_categories')) {
    /**
     * @param array $args
     * @return array|mixed
     */
    function get_categories(array $args = [])
    {
        $indent = Arr::get($args, 'indent', '——');

        $repo = app(CategoryInterface::class);

        $categories = $repo->getCategories(Arr::get($args, 'select', ['*']), [
            'categories.is_default' => 'DESC',
            'categories.order' => 'ASC',
        ]);

        $categories = sort_item_with_children($categories);

        foreach ($categories as $category) {
            $indentText = '';
            $depth = (int)$category->depth;
            for ($i = 0; $i < $depth; $i++) {
                $indentText .= $indent;
            }
            $category->indent_text = $indentText;
        }

        return $categories;
    }
}

if (!function_exists('get_categories_with_children')) {
    /**
     * @return array
     * @throws Exception
     */
    function get_categories_with_children()
    {
        if (\Auth::user()->super_user == 1) {
            $categories = app(CategoryInterface::class)
                ->getAllCategoriesWithChildren(['status' => BaseStatusEnum::PUBLISHED], [], ['id', 'name', 'parent_id']);
        } else {
            $cate = Auth::user()->categories;
            $categories = app(CategoryInterface::class)
                ->getAllCategoriesWithChildren(['status' => BaseStatusEnum::PUBLISHED], [], ['id', 'name', 'parent_id'])->whereIn('id', $cate);
        }
        $sortHelper = app(SortItemsWithChildrenHelper::class);
        $sortHelper
            ->setChildrenProperty('child_cats')
            ->setItems($categories);
        return $sortHelper->sort();
    }
}

if (!function_exists('register_post_format')) {
    /**
     * @param array $formats
     * @return void
     *
     */
    function register_post_format(array $formats)
    {
        PostFormat::registerPostFormat($formats);
    }
}

if (!function_exists('get_post_formats')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_post_formats($convert_to_list = false)
    {
        return PostFormat::getPostFormats($convert_to_list);
    }
}

if (!function_exists('get_all_profile')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_all_profile()
    {
        return Profile::where('status', 'published')->get();
    }
}

if (!function_exists('get_slug_profile')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_slug_profile($id)
    {
        return Slug::where('reference_id', $id)->where('reference_type', 'Botble\Profile\Models\Profile')->first();
    }
}

if (!function_exists('get_post_new')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_post_new($limit)
    {
        return Post::where('status', "published")->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
if (!function_exists('get_post_new_outstanding')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_post_new_outstanding($limit)
    {
        return Post::where('status', "published")->where('is_featured',1)->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
if (!function_exists('get_slug_newpost')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_slug_newpost($id)
    {
        return Slug::where('reference_id', $id)->where('reference_type', 'Botble\Blog\Models\Post')->first();
    }
}

if (!function_exists('get_profile_where_cate')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_profile_where_cate($id)
    {
        foreach ($id as $key) {
            $khoa_id[] = $key->id;
        }
        return Profile::whereIn('khoa_id', $khoa_id)->where('status', 'published')->get();
    }
}

if (!function_exists('get_data_tuyensinh')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_data_tuyensinh($loai)
    {
        return Tuyensinh::where('loai', $loai)->where('status', 'published')->first();
    }
}
if (!function_exists('get_post_by_categorys')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_post_by_categorys($categorys, $limit)
    {
        $post_id = [];
        foreach ($categorys as $category) {
            $post = DB::table('post_categories')->where('category_id', $category->id)->get();
            foreach ($post as $key) {
                $post_id[] = $key->post_id;
            }
        }
        return Post::whereIn('id', $post_id)->where('status', "published")->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
if (!function_exists('get_post_is_featured_by_categorys')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_post_is_featured_by_categorys($categorys, $limit)
    {
        $post_id = [];
        foreach ($categorys as $category) {
            $post = DB::table('post_categories')->where('category_id', $category->id)->get();
            foreach ($post as $key) {
                $post_id[] = $key->post_id;
            }
        }
        return Post::whereIn('id', $post_id)->where('status', "published")->where('is_featured', '1')->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}

if (!function_exists('get_post_by_category_id')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_post_by_category_id($category_id, $limit)
    {
        $post_id = [];
            $post = DB::table('post_categories')->where('category_id', $category_id)->get();
            foreach ($post as $key) {
                $post_id[] = $key->post_id;
            }
        return Post::whereIn('id', $post_id)->where('status', "published")->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
if (!function_exists('get_post_is_featured_by_category_id')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_post_is_featured_by_category_id($category_id, $limit)
    {
        $post_id = [];
            $post = DB::table('post_categories')->where('category_id', $category_id)->get();
            foreach ($post as $key) {
                $post_id[] = $key->post_id;
            }
        return Post::whereIn('id', $post_id)->where('status', "published")->where('is_featured', '1')->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
if (!function_exists('get_post_by_category_id_and_child_category')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_post_by_category_id_and_child_category($category_id, $limit)
    {
        $post_id = [];
        $post= new Collection();
        $child_cate= Category::where('status', 'published')->where('parent_id', $category_id)->get();
        foreach ($child_cate as $cate_id){
            $post = $post->merge(DB::table('post_categories')->where('category_id', $cate_id->id)->get());
        }
        $post = $post->merge(DB::table('post_categories')->where('category_id', $category_id)->get());
        foreach ($post as $key) {
            $post_id[] = $key->post_id;
        }
        return Post::whereIn('id', $post_id)->where('status', "published")->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}

if (!function_exists('get_post_by_category_tag')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_post_by_category_tag($limit)
    {
        return Post::where('status', "published")->orderBy('is_featured', 'desc')->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
if (!function_exists('get_menu_dao_tao')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_menu_dao_tao($key)
    {
        return Category::where('danhmuc', $key)->where('status', 'published')->where('parent_id', 0)->get();
    }
}
if (!function_exists('get_menu_con_dao_tao')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_menu_con_dao_tao($key)
    {
        return Category::where('status', 'published')->where('parent_id', $key)->get();
    }
}

if (!function_exists('check_url_dao_tao')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function check_url_dao_tao($key)
    {
        $slug = Slug::where('key', $key)->pluck('reference_id');
        foreach ($slug as $s) {
            $cate = Category::where('id', $s)->pluck('danhmuc');
            foreach ($cate as $c) {
                if ($c == 'daotao') {
                    return $c;
                }
                if ($c == 'nghiencuu') {
                    return $c;
                }
                if ($c == 'tintuc') {
                    return $c;
                }
            }
        }
        return false;
    }
}
if (!function_exists('get_posts_by_tag_nghiencuu')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_posts_by_tag_nghiencuu($limit)
    {
        $categorys = Category::where('danhmuc', 'nghiencuu')->get();
        foreach ($categorys as $category) {
            $post = DB::table('post_categories')->where('category_id', $category->id)->get();
            foreach ($post as $key) {
                $post_id[] = $key->post_id;
            }
        }
        return Post::whereIn('id', $post_id)->where('status', "published")->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}

if (!function_exists('get_name_user')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_name_user($id)
    {
        $user = User::where('id', $id)->get();
        foreach ($user as $key) {
            $name = $key->first_name . " " . $key->last_name;
        }
        return $name;
    }
}

if (!function_exists('get_categoty_child')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_categoty_child($id)
    {
        return Category::where('parent_id', $id)->orderBy('order', 'DESC')->get();
    }
}

if (!function_exists('get_posts_in_category')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_posts_in_category($name)
    {
        $id = Category::where('name', $name)->pluck('id');
        $post_id = [];
        $post = DB::table('post_categories')->where('category_id', $id)->get();
        foreach ($post as $key) {
            $post_id[] = $key->post_id;
        }
        return Post::whereIn('id', $post_id)->where('status', "published")->orderBy('created_at', 'desc')->get();
    }
}
if (!function_exists('get_posts_in_category_outstanding')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_posts_in_category_outstanding($name)
    {
        $id = Category::where('name', $name)->pluck('id');
        $post_id = [];
        $post = DB::table('post_categories')->where('category_id', $id)->get();
        foreach ($post as $key) {
            $post_id[] = $key->post_id;
        }
        return Post::whereIn('id', $post_id)->where([
            ['status', "published"],
            ['is_featured',1]
        ])->orderBy('created_at', 'desc')->get();
    }
}
if (!function_exists('get_posts_in_category_limit')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_posts_in_category_limit($name , $limit)
    {
        $id = Category::where('name', $name)->pluck('id');
        $post_id = [];
        $post = DB::table('post_categories')->where('category_id', $id)->get();
        foreach ($post as $key) {
            $post_id[] = $key->post_id;
        }
        return Post::whereIn('id', $post_id)->where('status', "published")->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
if (!function_exists('get_posts_in_category_outstanding_limit')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_posts_in_category_outstanding_limit($name , $limit)
    {
        $id = Category::where('name', $name)->pluck('id');
        $post_id = [];
        $post = DB::table('post_categories')->where('category_id', $id)->get();
        foreach ($post as $key) {
            $post_id[] = $key->post_id;
        }
        //return Post::whereIn('id', $post_id)->where('status', "published")->where('is_featured',1)->orderBy('created_at', 'desc')->limit($limit)->get();
        return Post::whereIn('id', $post_id)->where([
            ['status', "published"],
            ['is_featured',1]
        ])->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
if (!function_exists('get_posts_new_in_category_limit')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_posts_new_in_category_limit($name , $limit)
    {
        $id = Category::where('name', $name)->pluck('id');
        $post_id = [];
        $post = DB::table('post_categories')->where('category_id', $id)->get();
        foreach ($post as $key) {
            $post_id[] = $key->post_id;
        }
        //return Post::whereIn('id', $post_id)->where('status', "published")->where('is_featured',1)->orderBy('created_at', 'desc')->limit($limit)->get();
        return Post::whereIn('id', $post_id)->where([
            ['status', "published"]

        ])->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
if (!function_exists('get_child_menu')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_child_menu($name)
    {
        $parent_id = Category::where('name', $name)->pluck('id');
        return Category::where('parent_id', $parent_id)->get();
    }
}
if (!function_exists('get_child_menu_where_id')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_child_menu_where_id($id)
    {
        return Category::where('parent_id', $id)->get();
    }
}

if (!function_exists('get_first_posts_in_category')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_first_posts_in_category($id)
    {
        $post_id = [];
        $post = DB::table('post_categories')->where('category_id', $id)->get();
        foreach ($post as $key) {
            $post_id[] = $key->post_id;
        }
        return Post::whereIn('id', $post_id)->where('status', "published")->orderBy('created_at', 'asc')->first();
    }
}

