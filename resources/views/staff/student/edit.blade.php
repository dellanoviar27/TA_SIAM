@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    Edit Data Siswa | SIAM Al-Mu'min
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
                      <input type="text" name="name" value="{{ $student->user->name ?? '-' }}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nama Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('name')
                      <div>error</div>
                    @enderror
                  </div>

                   <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" name="email" value="{{ $student->user->email ?? '-' }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Email Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('email')
                      <div>error</div>
                    @enderror
                  </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_gender"  oninvalid="this.setCustomValidity ('Jenis Kelamin Wajib Diisi')"
                    onchange="this.setCustomValidity('')" required>
                    @if ($student->std_gender == "Perempuan")
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
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Asal Sekolah</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_school" value="{{ $student->std_school }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Asal Sekolah Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_school')
                      <div>error</div>
                    @enderror
                  </div>

                 <div class="mb-4 row align-items-center">
                    <label for="formalLevel" class="form-label col-sm-3 col-form-label">Tingkatan Sekolah</label>
                    <div class="col-sm-9">
                      <select name="std_formal_level" value="{{ $student->std_formal_level }}" id="formalLevel" class="form-control" required 
                        oninvalid="this.setCustomValidity('Tingkatan Sekolah Wajib Diisi')" 
                        onchange="handleFormalLevelChange(); this.setCustomValidity('')">
                        <option hidden value="">Pilih Tingkatan</option>
                        <option value="Belum Sekolah">Belum Sekolah</option>
                        <option value="TK">TK</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="Lulus SMA">Lulus SMA</option>
                        <option value="Kuliah">Kuliah</option>
                      </select>
                    </div>
                    @error('std_formal_level')
                      <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center" id="formalGradeWrapper">
                    <label for="formalGrade" class="form-label col-sm-3 col-form-label">Kelas Sekolah</label>
                    <div class="col-sm-9">
                      <select name="std_formal_grade" value="{{ $student->std_formal_grade }}" class="form-control">
                        <option hidden value="">Pilih Kelas</option>
                        @for ($i = 1; $i <= 12; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                      </select>
                    </div>
                    @error('std_formal_grade')
                      <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NISN</label>
                  <div class="col-sm-9">
                    <input type="number" name="std_nisn" value="{{ $student->std_nisn }}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('NISN Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_nisn')
                    <div>error</div>
                  @enderror
                </div>

                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <input type="submit" class="btn btn-primary" value="Submit" id="">
                  </div>
                </div>
              </div>
          </form>
          
        </div>
      </div>
   </div>

        @push('script')
        <script>
          function handleFormalLevelChange() {
            const level = document.getElementById('formalLevel').value;
            const gradeWrapper = document.getElementById('formalGradeWrapper');

            if (level === 'Belum Sekolah' || level === 'TK' || level === 'Lulus SMA' || level === 'Kuliah') {
              gradeWrapper.style.display = 'none';
              document.getElementById('formalGrade').value = '';
            } else {
              gradeWrapper.style.display = 'flex';
            }
          }

          document.addEventListener('DOMContentLoaded', function () {
            handleFormalLevelChange();
          });
        </script>
        @endpush
    
@endsection

@push('script')
    
@endpush