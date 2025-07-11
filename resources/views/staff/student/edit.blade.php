@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Edit Data Siswa
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Edit Data Siswa</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                  <input type="number" name="std_nik" value="{{$student->std_nik}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('NIK Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('std_nik')
                  <div>error</div>
                @enderror
              </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nama Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('name')
                      <div>error</div>
                    @enderror
                  </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_gender"  oninvalid="this.setCustomValidity ('Jenis Kelamin Wajib Diisi')"
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
                  @error('std_gender')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_birth_place" value="{{ $student->std_birth_place }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tempat Lahir Kelas Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_birth_place')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input type="date" name="std_birth_date" value="{{ $student->std_birth_date }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tanggal Lahir Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_birth_date')
                      <div>error</div>
                    @enderror
                  </div>

                   <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Anak Ke</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_child_to" value="{{ $student->std_child_to }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_child_to')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Jumlah Saudara</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_number_of_siblings" value="{{ $student->std_number_of_siblings }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_number_of_siblings')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_address" value="{{ $student->std_address }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_address')
                      <div>error</div>
                    @enderror
                  </div>

                    <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_address" value="{{ $student->std_address }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_address')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_address" value="{{ $student->std_address }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_address')
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

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" name="tch_email" value="{{$teacher->tch_email}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Email Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_email')
                      <div>error</div>
                    @enderror
                  </div>

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
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tugas Tambahan</label>
                    <div class="col-sm-9">
                      <input type="text" name="tch_additional_task" value="{{$teacher->tch_additional_task}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tugas Tambahan Pendidikan Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_additional_task')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tugas Tambahan</label>
                    <div class="col-sm-9">
                      <input type="file" name="tch_pictures" value="{{$teacher->tch_pictures}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Foto Diri Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('tch_pictures')
                      <div>error</div>
                    @enderror
                  </div>

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