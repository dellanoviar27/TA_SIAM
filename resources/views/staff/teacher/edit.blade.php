@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Edit Kelas
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Edit Kelas</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                  <input type="number" name="tch_nik" value="{{$teacher->tch_nik}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('NIK Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('tch_nik')
                  <div>error</div>
                @enderror
              </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                      <input type="text" name="tch_name" value="{{$teacher->tch_name}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nama Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_name')
                      <div>error</div>
                    @enderror
                  </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="tch_gender"  oninvalid="this.setCustomValidity ('Jenis Kelamin Wajib Diisi')"
                    onchange="this.setCustomValidity('')" required>
                    @if ($teacher->tch_gender == "Perempuan")
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-laki">Laki-laki</option>
                    @else
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-laki">Laki-laki</option>
                    @endif
                    </select>
                  </div>
                  @error('tch_gender')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" name="tch_birth_place" value="{{$teacher->tch_birth_place}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tempat Lahir Kelas Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_birth_place')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input type="date" name="tch_birth_date" value="{{$teacher->tch_birth_date}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tanggal Lahir Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_birth_date')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" name="tch_address" value="{{$teacher->tch_address}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_address')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Telpon</label>
                    <div class="col-sm-9">
                      <input type="tel" name="tch_phone" value="{{$teacher->tch_phone}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Telpon Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_phone')
                      <div>error</div>
                    @enderror
                  </div>

                  {{-- <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" name="tch_email" value="{{$teacher->tch_email}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Email Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_email')
                      <div>error</div>
                    @enderror
                  </div> --}}

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-sm-9">
                      <input type="text" name="tch_last_education" value="{{$teacher->tch_last_education}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Pendidikan Terakhir Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_last_education')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pendidikan Saat Ini</label>
                    <div class="col-sm-9">
                      <input type="text" name="tch_current_education" value="{{$teacher->tch_current_education}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Pendidikan Saat Ini Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_current_education')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Institusi Pendidikan</label>
                    <div class="col-sm-9">
                      <input type="text" name="tch_name_institution" value="{{$teacher->tch_name_institution}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Institusi Pendidikan Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_name_institution')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tugas Utama</label>
                    <div class="col-sm-9">
                      <input type="text" name="tch_main_task" value="{{$teacher->tch_main_task}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tugas Utama Pendidikan Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_main_task')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tugas Tambahan</label>
                    <div class="col-sm-9">
                      <input type="text" name="tch_additional_task" value="{{$teacher->tch_additional_task}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tugas Tambahan Pendidikan Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_additional_task')
                      <div>error</div>
                    @enderror
                  </div>

                  {{-- <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                      <input type="file" name="tch_pictures" value="{{$teacher->tch_pictures}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Foto Diri Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_pictures')
                      <div>error</div>
                    @enderror
                  </div> --}}

                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <input type="submit" class="btn btn-primary" value="Kirim" id="">
                  </div>
                </div>
              </div>
          </form>
          
        </div>
      </div>
   </div>
    
@endsection



@push('script')
    
@endpush