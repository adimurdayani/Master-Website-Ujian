@extends('front.layouts.main')

@section('container')
<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-down">
    <div class="section-title">
      @if (request()->routeIs('informatika.about'))
      <h4>Tentang Laboratorium Teknik Informatika</h4>
    </div>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-5">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <strong>Laboratorium Informatika</strong>
              <p>Fakultas Teknik</p>
            </div>
          </div>
        </div>

        <div class="col-xl-7">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Lab
                    IT</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Daftar Lab</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <strong class="card-title">Laboratorium Teknik Informatika</strong>
                  <p class="small fst-italic">Merupakan Laboratorium yang berada pada Universitas Andi Djemma Palopo
                    yang wajib diprogramkan mahasiswa Program Studi Teknik Informatika. Untuk melihat daftar
                    Laboratorium yang ada pada Program Studi Teknik Informatika, silahkan pilih menu Daftar Lab di atas.
                  </p>
                </div>
                <div class="tab-pane fade pt-3" id="profile-settings">
                  <!-- Settings Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Daftar Lab Software</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <label class="form-check-label" for="changesMade">
                            Pemrograman Pascal
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="newProducts">
                            Pemrograman C++
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="changesMade">
                            Pemrograman Visual Basic
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="newProducts">
                            Pemrograman Java
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="newProducts">
                            Pemrograman Website
                          </label>
                        </div>
                      </div>
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Daftar Lab Hardware</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <label class="form-check-label" for="changesMade">
                            Eletronika Digital
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="newProducts">
                            Microkontroller
                          </label>
                        </div>
                      </div>
                  </form><!-- End settings Form -->
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
    @elseif(request()->routeIs('sipil.about'))
    <h4>Tentang Laboratorium Teknik Sipil</h4>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-5">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <strong>Laboratorium Sipil</strong>
              <p>Fakultas Teknik</p>
            </div>
          </div>
        </div>

        <div class="col-xl-7">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Lab
                    Sipil</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Daftar Lab</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <strong class="card-title">Laboratorium Teknik Sipil</strong>
                  <p class="small fst-italic">Merupakan Laboratorium yang berada pada Universitas Andi Djemma Palopo
                    yang wajib diprogramkan mahasiswa Program Studi Teknik sipil. Untuk melihat daftar Laboratorium yang
                    ada pada Program Studi Teknik Sipil, silahkan pilih menu Daftar Lab di atas.</p>
                </div>
                <div class="tab-pane fade pt-3" id="profile-settings">
                  <!-- Settings Form -->
                  <form>
                    <div class="row mb-3">
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <label class="form-check-label" for="changesMade">
                            Laboratorium Gambar
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="newProducts">
                            Laboratorium Mekanika Tanah
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="changesMade">
                            Laboratorium Struktur & Bahan
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="newProducts">
                            Laboratorium Hidrolika
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="newProducts">
                            Laboratorium Pemetaan & Survey
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="newProducts">
                            Laboratorium Jalan & Aspal
                          </label>
                        </div>
                      </div>
                  </form><!-- End settings Form -->
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @endif
  </div>
  </div>
</section><!-- End About Section -->
@endsection