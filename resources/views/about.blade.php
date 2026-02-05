<section id="about" class="about">
  <!-- ======= About Me ======= -->
  <div class="about-me container">
    <div class="section-title">
      <h2>Tentang</h2>
      <p>Lebih Lanjut Tentang Saya</p>
    </div>

    @if($about)
      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="{{ $about->image ? Storage::url($about->image) : '/assets/img/me.png' }}" class="img-fluid" alt="" />
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>{{ $about->title }}</h3>
          <p class="fst-italic">
            {{ $about->subtitle }}
          </p>
          <div class="row">
            @php
              $details = $about->details ?? [];
              $half = ceil(count($details) / 2);
              $chunks = array_chunk($details, $half > 0 ? $half : 1);
            @endphp
            @foreach($chunks as $chunk)
              <div class="col-lg-6">
                <ul>
                  @foreach($chunk as $item)
                    <li>
                      <i class="bi bi-chevron-right"></i>
                      <strong>{{ $item['label'] }}:</strong>
                      <span>{{ $item['value'] }}</span>
                    </li>
                  @endforeach
                </ul>
              </div>
            @endforeach
          </div>
          <p>
            {!! nl2br(e($about->description)) !!}
          </p>
        </div>
      </div>
    @endif
  </div>
  <!-- End About Me -->

  <!-- ======= Counts ======= -->
  <!-- <div class="counts container">
                                    <div class="row">
                                      <div class="col-lg-3 col-md-6">
                                        <div class="count-box">
                                          <i class="bi bi-emoji-smile"></i>
                                          <span
                                            data-purecounter-start="0"
                                            data-purecounter-end="319"
                                            data-purecounter-duration="1"
                                            class="purecounter"
                                          ></span>
                                          <p>Teman</p>
                                        </div>
                                      </div>

                                      <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                                        <div class="count-box">
                                          <i class="bi bi-journal-richtext"></i>
                                          <span
                                            data-purecounter-start="0"
                                            data-purecounter-end="102"
                                            data-purecounter-duration="1"
                                            class="purecounter"
                                          ></span>
                                          <p>Proyek</p>
                                        </div>
                                      </div>
                                      <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                                        <div class="count-box">
                                          <i class="bi bi-headset"></i>
                                          <span
                                            data-purecounter-start="0"
                                            data-purecounter-end="16"
                                            data-purecounter-duration="1"
                                            class="purecounter"
                                          ></span>
                                          <p>Jam Kerja</p>
                                        </div>
                                      </div>

                                      <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                                        <div class="count-box">
                                          <i class="bi bi-award"></i>
                                          <span
                                            data-purecounter-start="0"
                                            data-purecounter-end="25"
                                            data-purecounter-duration="1"
                                            class="purecounter"
                                          ></span>
                                          <p>Penghargaan</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div> -->
  <!-- End Counts -->

  <!-- ======= Skills  ======= -->
  <div class="skills container">
    <div class="section-title">
      <h2>Skill</h2>
    </div>

    <div class="row skills-content">
      @if($about && $about->skills)
        @php
          $skills = $about->skills;
          $half = ceil(count($skills) / 2);
          $chunks = array_chunk($skills, $half > 0 ? $half : 1);
        @endphp
        @foreach($chunks as $chunk)
          <div class="col-lg-6">
            @foreach($chunk as $skill)
              <div class="progress">
                <span class="skill">{{ $skill['name'] }} <i class="val">{{ $skill['percentage'] }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill['percentage'] }}" aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      @endif
    </div>
  </div>
  <!-- End Skills -->

  <!-- ======= Interests ======= -->
  <div class="interests container">
    <div class="section-title">
      <h2>Hobi</h2>
    </div>

    <div class="row">
      @if($about && $about->hobbies)
        @foreach($about->hobbies as $hobby)
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="{{ $hobby['icon'] ?? 'ri-star-line' }}" style="color: {{ $hobby['color'] ?? '#b2904f' }}"></i>
              <h3>{{ $hobby['name'] }}</h3>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
  <!-- End Interests -->

  <!-- ======= Testimonials ======= -->
  <!-- <div class="testimonials container">
                                    <div class="section-title">
                                      <h2>Testimoni</h2>
                                    </div>

                                    <div
                                      class="testimonials-slider swiper"
                                      data-aos="fade-up"
                                      data-aos-delay="100"
                                    >
                                      <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                          <div class="testimonial-item">
                                            <p>
                                              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                              Proin iaculis purus consequat sem cure digni ssim donec
                                              porttitora entum suscipit rhoncus. Accusantium quam, ultricies
                                              eget id, aliquam eget nibh et. Maecen aliquam, risus at
                                              semper.
                                              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                            </p>
                                            <img
                                              src="/assets/img/testimonials/testimonials-1.jpg"
                                              class="testimonial-img"
                                              alt=""
                                            />
                                            <h3>Saul Goodman</h3>
                                            <h4>Ceo &amp; Founder</h4>
                                          </div>
                                        </div>

                                        <div class="swiper-slide">
                                          <div class="testimonial-item">
                                            <p>
                                              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                              Export tempor illum tamen malis malis eram quae irure esse
                                              labore quem cillum quid cillum eram malis quorum velit fore
                                              eram velit sunt aliqua noster fugiat irure amet legam anim
                                              culpa.
                                              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                            </p>
                                            <img
                                              src="/assets/img/testimonials/testimonials-2.jpg"
                                              class="testimonial-img"
                                              alt=""
                                            />
                                            <h3>Sara Wilsson</h3>
                                            <h4>Designer</h4>
                                          </div>
                                        </div>

                                        <div class="swiper-slide">
                                          <div class="testimonial-item">
                                            <p>
                                              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                              Enim nisi quem export duis labore cillum quae magna enim sint
                                              quorum nulla quem veniam duis minim tempor labore quem eram
                                              duis noster aute amet eram fore quis sint minim.
                                              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                            </p>
                                            <img
                                              src="/assets/img/testimonials/testimonials-3.jpg"
                                              class="testimonial-img"
                                              alt=""
                                            />
                                            <h3>Jena Karlis</h3>
                                            <h4>Store Owner</h4>
                                          </div>
                                        </div>

                                        <div class="swiper-slide">
                                          <div class="testimonial-item">
                                            <p>
                                              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                              Fugiat enim eram quae cillum dolore dolor amet nulla culpa
                                              multos export minim fugiat minim velit minim dolor enim duis
                                              veniam ipsum anim magna sunt elit fore quem dolore labore
                                              illum veniam.
                                              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                            </p>
                                            <img
                                              src="/assets/img/testimonials/testimonials-4.jpg"
                                              class="testimonial-img"
                                              alt=""
                                            />
                                            <h3>Matt Brandon</h3>
                                            <h4>Freelancer</h4>
                                          </div>
                                        </div>

                                        <div class="swiper-slide">
                                          <div class="testimonial-item">
                                            <p>
                                              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua
                                              veniam tempor noster veniam enim culpa labore duis sunt culpa
                                              nulla illum cillum fugiat legam esse veniam culpa fore nisi
                                              cillum quid.
                                              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                            </p>
                                            <img
                                              src="/assets/img/testimonials/testimonials-5.jpg"
                                              class="testimonial-img"
                                              alt=""
                                            />
                                            <h3>John Larson</h3>
                                            <h4>Entrepreneur</h4>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="swiper-pagination"></div>
                                    </div>

                                    <div class="owl-carousel testimonials-carousel"></div>
                                  </div> -->
  <!-- End Testimonials  -->
</section>