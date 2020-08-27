<div class="">
                <img src="{{get_object_image(get_data_tuyensinh("banner")->image)}}" width="100%">
</div>
<div class="container">
    <br>
    {!! Theme::breadcrumb()->render() !!}
    <br>
    @if($page->name == "Liên hệ")
        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
                alert(msg);
            }
        </script>
        <div class="row">
            <div class="col-8">
                <div>
                    <h2 style="font-size: 22px; text-align: center; padding-bottom: 15px;">Góp ý và phản hồi</h2>
                </div>
                {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
                <br>
                <form action="{{route('feedback')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Tên của bạn:</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Họ và tên" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="sdt">Số điện thoại</label>
                                <input type="tel" pattern="[0-9]{10}" name="phone" class="form-control" id="sdt" aria-describedby="emailHelp" placeholder="Số điện thoại" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="td">Tiêu đề:</label>
                                <input type="text" name="title" class="form-control" id="td" aria-describedby="emailHelp" placeholder="Tiêu đề " required>
                            </div>
                            <div class="form-group">
                                <label for="nd">Nội dung chi tiết:</label>
                                <textarea name="content" class="form-control" id="nd" rows="3"  required></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi đi</button>
                </form>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <h2 style="font-size: 22px; text-align: center; padding-bottom: 15px;">Thông tin liên hệ</h2>
                        </div>
                        <ul class="list">
                            <li>Phone: {{ theme_option('phone') }}</li>
                            <li>Email: <a href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a>
                            </li>
                            <li>Address: {{ theme_option('address') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div>
                        <h2 style="font-size: 22px; text-align: center; padding: 15px 15px;">Bản đồ</h2>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6963246222786!2d105.84315191448522!3d21.004806686011328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1591199534409!5m2!1svi!2s" width="600" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    </div>
            </div>
        </div>
    @else
        {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
        <br>
    @endif
    <br>
</div>
