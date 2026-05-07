<section id="resume" class="resume">
    <div class="container">
        <div class="section-title">
            <h2>Riwayat</h2>
            <p>Pengalaman Saya</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h3 class="resume-title">Ringkasan</h3>
                @php
                    $summaries = $resumes->where('category', 'summary');
                @endphp
                @if($summaries->count() > 0)
                    @foreach($summaries as $resume)
                        <div class="resume-item pb-0">
                            <h4>{{ $resume->title }}</h4>
                            <p><em>{{ $resume->description }}</em></p>
                            @if($resume->details)
                                <ul>
                                    @foreach($resume->details as $detail)
                                        <li>{{ $detail['item'] }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                @endif

                <h3 class="resume-title">Pendidikan</h3>
                @php
                    $educations = $resumes->where('category', 'education');
                @endphp
                @if($educations->count() > 0)
                    @foreach($educations as $resume)
                        <div class="resume-item">
                            <h4>{{ $resume->title }}</h4>
                            <h5>{{ $resume->period }}</h5>
                            <p><em>{{ $resume->subtitle }}</em></p>
                            <p>{{ $resume->description }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-lg-6">
                <h3 class="resume-title">Pengalaman Kerja</h3>
                @php
                    $experiences = $resumes->where('category', 'experience');
                @endphp
                @if($experiences->count() > 0)
                    @foreach($experiences as $resume)
                        <div class="resume-item">
                            <h4>{{ $resume->title }}</h4>
                            <h5>{{ $resume->period }}</h5>
                            <p><em>{{ $resume->subtitle }}</em></p>
                            @if($resume->description)
                                <p>{{ $resume->description }}</p>
                            @endif
                            @if($resume->details)
                                <ul>
                                    @foreach($resume->details as $detail)
                                        <li>{{ $detail['item'] }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>