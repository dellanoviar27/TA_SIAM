@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    Tambah Wali Kelas | SIAM Al-Mu'min
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Tambah Wali Kelas</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">

                <div class="mb-4 row align-items-center">
                  <label for="Select" class="form-label col-sm-3 col-form-label">Kelas</label>
                  <div class="col-sm-9">
                  <select id="Select" name="cls_id" class="form-control" required>
                  <option hidden  value="">Pilih Kelas</option>
                  @foreach ($classes as  $Classes)
                    <option value="{{ $Classes->cls_id }}">{{ $Classes->cls_level }} {{ $Classes->cls_number }}</option>
                  @endforeach
                  </select>
                  @error('hrt_class_id')
                      <div id="hrt_id" class="form-text">{{ $message }}</div>
                  @enderror
                  </div>
              </div>

                <div class="mb-4 row align-items-center">
                  <label for="Select" class="form-label col-sm-3 col-form-label">Wali Kelas</label>
                  <div class="col-sm-9">
                  <select id="Select" name="tch_id" class="form-control" required>
                  <option hidden  value="">Pilih Guru</option>
                  @foreach ($teacher as  $teacher)
                    <option value="{{ $teacher->tch_id }}">{{ $teacher->user->name ?? '-' }}</option>
                  @endforeach
                  </select>
                  @error('hrt_user_id')
                      <div id="hrt_id" class="form-text">{{ $message }}</div>
                  @enderror
                  </div>
              </div>

                <div class="mb-4 row align-items-center">
                <label for="Select" class="form-label col-sm-3 col-form-label">Semester</label>
                <div class="col-sm-9">
                <select id="Select" name="smt_id" class="form-control" required>
                <option hidden  value="">Pilih Semester</option>
                @foreach ($semester as $semester)
                  <option value="{{ $semester->smt_id }}">{{ $semester->smt_school_year}} | {{ $semester->smt_semester}}</option>
                @endforeach
                </select>
                @error('sch_semester_id')
                    <div id="sch_id" class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>
                
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <input type="submit" class="btn btn-primary me-2" value="Kirim">
                    <input type="button" class="btn btn-danger" value="Batal" onclick="history.back();">
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