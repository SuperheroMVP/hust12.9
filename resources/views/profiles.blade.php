<section class="main-box">
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Cán bộ</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <!-- Blogs -->
        <section class="blog b-archives section">
            {!! Theme::breadcrumb()->render() !!}
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="learnedu-sidebar left">
                            @if (is_plugin_active('profile'))
                                <div class="search">
                                    <div class="form">
                                        <form class="quick-search" action="{{ route('public.search') }}">
                                            <input type="text" name="q" placeholder="{{ __('Type to search...') }}" class="form-control search-input" autocomplete="off">
                                        </form>
                                        <button class="button"><i class="fa fa-search"></i></button>
                                        <div class="search-result"></div>
                                    </div>
                                </div>
                        @endif
                        <!-- Categories -->
                            <div class="single-widget categories">
                                <h3 class="title">Danh sách bộ môn</h3>
                                <ul>
{{--                                    @foreach (get_all_categories(['categories.status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED, 'categories.parent_id' => 0, 'categories_check' => 'so_do_to_chuc']) as $category)--}}
{{--                                        @php--}}
{{--                                            $allRelatedCategoryIds = array_unique(array_merge(app(\Botble\Blog\Repositories\Interfaces\CategoryInterface::class)->getAllRelatedChildrenIds($category), [$category->id]));--}}

{{--                                            $postk = app(\Botble\Blog\Repositories\Interfaces\PostInterface::class)->getByCategory($allRelatedCategoryIds, 0, $loop->index % 2 == 0 ? 6 : 5);--}}
{{--                                        @endphp--}}
{{--                                        @foreach($postk as $posti)--}}
{{--                                            <li><a href="{{ $posti->url }}"><i class="fa fa-angle-right"></i>{{ $posti->name }}</a></li>--}}
{{--                                        @endforeach--}}
{{--                                    @endforeach--}}
                                </ul>
                            </div>
                            <!--/ End Categories -->
                            <!-- Posts -->
                            <div class="single-widget posts">
                                <h3>Bài viết <span>gần đây</span></h3>

                            </div>
                            <!--/ End Posts -->
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="row">
                            @if ($profiles->count() > 0)
                                @foreach ($profiles as $profile)
                                    <div class="col-lg-6 col-12">
                                        <!-- Single Blog -->
                                        <div class="single-blog">
                                            <div class="blog-head overlay">
                                                <div class="date">
                                                    <h4><time datetime="">{{ date_from_database($profile->created_at, 'M d, Y') }}</time></h4>
                                                </div>
                                                <img class="img-full img-bg" src="{{ get_object_image($profile->image, 'medium') }}" style="background-image: url('{{ get_object_image($profile->image) }}');" alt="{{ $profile->name }}">
                                            </div>
                                            <div class="blog-content">
                                                <h4 class="blog-title"><a href="{{ $profile->url }}" title="{{ $profile->name }}">
                                                        {{ $profile->name }}
                                                    </a></h4>
                                                <p>{{ $profile->description }}</p>
                                                <div class="button">
                                                    <a href="{{ $profile->url }}" class="btn">Xem thêm<i class="fa fa-angle-double-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Blog -->
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <p>{{ __('Không tìm thấy dữ liệu!') }}</p>
                                </div>
                            @endif
{{--                            @if ($profiles->count() > 0)--}}
{{--                                <nav class="pagination-wrap">--}}
{{--                                    {!! $profiles->links() !!}--}}
{{--                                </nav>--}}
{{--                            @endif--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

