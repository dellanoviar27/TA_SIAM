@extends('staff.master_student')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Daftar PPDB
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Pendaftaran PPDB</h4>
          </div>
          {{-- <form action="" method="post"> --}}
          <form action="{{ route('student.Ppdb_Student.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                  <input type="number" name="std_nik" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('NIK Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('std_nik')
                  <div>error</div>
                @enderror
              </div>

              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" name="std_name" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('std_name')
                  <div>error</div>
                @enderror
              </div>

              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                  <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_gender" oninvalid="this.setCustomValidity ('Jenis Kelamin Wajib Diisi')"
                  onchange="this.setCustomValidity('')" required>
                      <option selected value="">Pilih...</option>
                      <option value="Perempuan">Perempuan</option>
                      <option value="Laki-laki">Laki-laki</option>
                  </select>
                </div>
                @error('std_gender')
                  <div>error</div>
                @enderror
              </div>

              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                  <input type="text" name="std_birth_place" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tempat Lahir Kelas Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('std_birth_place')
                  <div>error</div>
                @enderror
              </div>

              <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="date" name="std_birth_date" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tanggal Lahir Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_birth_date')
                    <div>error</div>s
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Anak Ke</label>
                  <div class="col-sm-9">
                    <input type="text" name="std_child_to" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Anak Ke Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_child_to')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Jumlah Saudara</label>
                  <div class="col-sm-9">
                    <input type="text" name="std_number_of_siblings" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Jumlah Saudara Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_number_of_siblings')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <input type="text" name="std_address" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_address')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-9">
                      <input type="date" name="std_date_registration" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tanggal Masuk Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_date_registration')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Sekolah</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_school" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Sekolah Umum Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_school')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="Select" class="form-label col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-9">
                    <select id="Select" name="cls_id" class="form-control" required>
                    <option hidden  value="">Pilih Kelas</option>
                    @foreach ($classes as  $Classes)
                      <option value="{{ $Classes->cls_id }}">
                        {{ $Classes->cls_level }} {{ $Classes->cls_number }} {{ $Classes->cls_general_level }}
                      </option>
                    @endforeach
                    </select>
                    @error('std_class_id')
                        <div id="std_id" class="form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                {{-- <div class="mb-4 row align-items-center">
                    <label for="Select" class="form-label col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                    <select id="Select" name="cls_id" class="form-control" required>
                    <option hidden  value="">Pilih Kelas</option>
                    @foreach ($classes as  $Classes)
                      <option value="{{ $Classes->cls_id }}">
                        {{ $Classes->cls_level }} {{ $Classes->cls_number }} {{ $Classes->cls_general_level }}
                      </option>
                    @endforeach
                    </select>
                    @error('std_class_id')
                        <div id="std_id" class="form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div> --}}

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NISN</label>
                  <div class="col-sm-9">
                    <input type="number" name="std_nisn" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('NISN Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_nisn')
                    <div>error</div>
                  @enderror
                </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Foto Diri</label>
                    <div class="col-sm-9">
                      <input type="file" name="std_pictures" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Foto Diri Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div> 
                    @error('std_picturess')
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