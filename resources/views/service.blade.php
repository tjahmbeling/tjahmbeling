<section id="services" class="services">
    <div class="container">
        <div class="section-title">
            <h2>Layanan</h2>
            <p>Motto Saya</p>
        </div>

        <div class="row">
            @foreach($services as $service)
                <div
                    class="col-lg-4 col-md-6 d-flex align-items-stretch {{ $loop->index >= 3 ? 'mt-4' : ($loop->index > 0 ? 'mt-4 mt-md-0' : '') }}">
                    <div class="icon-box">
                        <div class="icon"><i class="{{ $service->icon ?? 'bx bx-help-circle' }}"></i></div>
                        <h4><a href="javascript:void(0)">{{ $service->title }}</a></h4>
                        <p>
                            {{ $service->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>