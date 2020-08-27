
<div class=" ">
{{--                <h2>{{ __('Tìm kiếm: ') }} "{{ Request::input('q') }}"</h2>--}}
                <img src="{{get_object_image(get_data_tuyensinh("banner")->image)}}" width="100%">

</div>
<section class="section pt-100 pb-50 bg-lightgray">
    <div class="container">
        {!! Theme::breadcrumb()->render() !!}
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="page-content blog">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="col-lg-12">
                                <!-- Single Blog -->
                                <div class="d-flex flex-row p-2">
                                    <div class="blog-content col-8 ">
                                        <h4 class="blog-title"><a href="{{ $post->url }}"
                                                                  title="{{ $post->name }}">
                                                {{ $post->name }}
                                            </a></h4>
                                        <p>{{ $post->description }}</p>
                                        <a href="{{ $post->url }}" style="color: orange">Xem thêm</a>
                                    </div>
                                    <div class="blog-head overlay col-4 p-0">
                                        <div class="date">
                                            <h4>
                                                <time datetime="">{{ date_from_database($post->created_at, 'M d, Y') }}</time>
                                            </h4>
                                        </div>
                                        <div>
                                            <img class="img-full img-bg"
                                                 src="{{ get_object_image($post->image, 'medium') }}"
                                                 style="background-image: url('{{ get_object_image($post->image) }}');"
                                                 alt="{{ $post->name }}">
                                        </div>
                                    </div>

                                </div>
                                <!-- End Single Blog -->
                                <hr>
                            </div>
                        @endforeach
                    @else
                        <div class="justify-content-center">
                            <br>
                            <p>{{ __('Không có kết quả nào!') }}</p>
                            <br>
                        </div>
                    @endif
                        @if ($posts->count() > 0)
                        <div class="page-pagination text-right">
                            {!! $posts->links() !!}
                        </div>
                        @endif
            </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="learnedu-sidebar left">
                    <div class="single-widget posts">
                        <h3>Bài viết mới nhất</h3>
                        @foreach(get_post_new() as $newpost)
                            @php
                                $slug = get_slug_newpost($newpost->id);
                            @endphp
                            <div class="single-post">
                                <div class="post-img">
                                    <img src="{{ get_object_image($newpost->image) }}" alt="">
                                </div>
                                <div class="post-info">
                                    <h4><a href="{{ asset($slug->key) }}">{{$newpost->name}}</a></h4>
                                    <span><i class="fa fa-calendar"></i>{{$newpost->created_at}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
