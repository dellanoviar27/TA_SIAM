@extends('admin.master')

@push('link')
    
@endpush

@section('title')
    SiSordu | Tambah Jadwal
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Tambah Kelas</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Hari</label>
                  <div class="col-sm-9">
                    {{-- <input type="text" name="mjr_name" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nama Jurusan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')"> --}}
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="sch_day" oninvalid="this.setCustomValidity ('Hari Wajib Diisi')"
                    onchange="this.setCustomValidity('')" required>
                        <option selected value="">Pilih...</option>
                        <option value="Senin">VII</option>
                        <option value="Selasa">VIII</option>
                        <option value="Rabu">IX</option>
                        <option value="Kamis">IX</option>
                        <option value="Jum'at">IX</option>
                    </select>
                  </div>
                  @error('sch_day')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-9">
                      <input type="text" name="sch_class_id" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Kelas Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('sch_class_id')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Mata Pelajaran</label>
                    <div class="col-sm-9">
                      <input type="text" name="sch_subject_id" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Mata Pelajaran Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('sch_subject_id')
                      <div>error</div>
                    @enderror
                  </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Guru</label>
                  <div class="col-sm-9">
                    <input type="text" name="sch_teacher_id" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Guru Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('sch_teacher_id')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Jam Mulai</label>
                    <div class="col-sm-9">
                      <input type="time" name="sch_start_time" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Jam Mulai Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('sch_start_time')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Jam Selesai</label>
                    <div class="col-sm-9">
                      <input type="time" name="sch_end_time" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Jam Selesai Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('sch_end_time')
                      <div>error</div>
                    @enderror
                  </div>

                {{-- <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Wali Kelas</label>
                  <div class="col-sm-9">
                    <input type="text" name="cls_homeroom" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('cls_homeroom')
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