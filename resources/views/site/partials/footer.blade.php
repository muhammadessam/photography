<footer class="mt-3">
    <div class="bg-light-color">
        <div class=" last-footer container ">
            <div class="row p-1">
                @foreach(@App\Page::all()->where('place','footer') as $page)
                    <div class="col">
                        <a class="list-link text-white" href="{{ route('page',$page->title) }}">{{$page->title}}</a>
                    </div>
                @endforeach
            </div>
            <div class="copy-rights d-flex align-items-center">
                <a href="https://www.const-tech.com.sa/" target="_black" class="text-white mb-0">جميع الحقوق محفوظة © لـ <span
                        class="site-nv">توثيق لخدمات التصوير</span> 2020 م </a>
            </div>
                <div>
                    <a href="https://www.const-tech.com.sa/" target="_black"><img class="c-logo" src="{{asset('images/company-logo.svg')}}"
                                                                                alt=""></a>
                </div>

        </div>
    </div>
</footer>
