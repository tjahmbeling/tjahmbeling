<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2>Kontak</h2>
            <p>Hubungi Saya</p>
        </div>

        <div class="row mt-2">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Alamat Saya</h3>
                    <a href="{{ $contact?->maps_link ?? 'javascript:void(0)' }}"
                        target="{{ $contact?->maps_link ? '_blank' : '_self' }}">
                        <p id="custom">{{ $contact?->address ?? 'Jl Selogongsong, Nganjuk, Indonesia' }}</p>
                    </a>
                </div>
            </div>

            <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-share-alt"></i>
                    <h3>Sosial Media</h3>
                    <div class="social-links">
                        @if(isset($sosmeds) && count($sosmeds) > 0)
                            @foreach($sosmeds as $sosmed)
                                @if($sosmed['is_active'])
                                    <a href="{{ $sosmed['link'] }}" class="social-icon" target="_blank"><i
                                            class="{{ $sosmed['icon'] }}"></i></a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Saya</h3>
                    <a href="mailto:{{ $contact?->email ?? 'wiagmadra@gmail.com' }}">
                        <p id="custom">{{ $contact?->email ?? 'wiagmadra@gmail.com' }}</p>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mt-4 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-phone-call"></i>
                    <h3>No. Handphone</h3>
                    <a
                        href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', $contact?->phone ?? '6285649073770') }}">
                        <p id="custom">{{ $contact?->phone ?? '0856 4907 3770' }}</p>
                    </a>
                </div>
            </div>
        </div>

        <form action="{{ route('contact.submit') }}" method="POST" role="form" class="mt-4">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <input type="text" name="nama_2" class="form-control" id="name" placeholder="Nama Anda" required
                        style="background: #111; color: #fff; border: 1px solid #333; padding: 10px;" />
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email_2" id="email" placeholder="Email Anda" required
                        style="background: #111; color: #fff; border: 1px solid #333; padding: 10px;" />
                </div>
            </div>
            <div class="form-group mt-3">
                <input type="number" class="form-control" name="nomor_2" id="subject" placeholder="No. Handphone Anda"
                    required style="background: #111; color: #fff; border: 1px solid #333; padding: 10px;" />
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" name="pesan_2" rows="5" placeholder="Masukkan Pesan Anda" required
                    style="background: #111; color: #fff; border: 1px solid #333; padding: 10px;"></textarea>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn" id="send"
                    style="background: red; color: #fff; padding: 10px 30px; border-radius: 4px; transition: 0.4s; border: 0; font-weight: 500;">
                    Kirim Pesan
                </button>
            </div>
        </form>
    </div>
</section>