@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    Edit Wali Kelas | SIAM Al-Mu'min
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Edit Wali Kelas</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">

              <div class="mb-4 row align-items-center">
                <label for="Select" class="form-label col-sm-3 col-form-label">Kelas</label>
                <div class="col-sm-9">
                <select id="Select" name="cls_id" class="form-control" required>
                <option   value="{{$homeroom_teacher->class->cls_id}}">{{$homeroom_teacher->class->cls_level}} {{$homeroom_teacher->class->cls_number}}</option>
                @foreach ($classes as  $Classes)
                  <option value="{{$Classes->cls_id}}">{{$Classes->cls_level}} {{$Classes->cls_number}}</option>
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
              <option   value="{{$homeroom_teacher->teacher->tch_id}}">{{$homeroom_teacher->teacher->user->name ?? '-' }}</option>
              @foreach ($teacher as  $teacher)
                <option value="{{$teacher->tch_id}}">{{$homeroom_teacher->teacher->user->name ?? '-' }}</option>
              @endforeach
              </select>
              @error('hrt_teacher_id')
                  <div id="hrt_id" class="form-text">{{ $message }}</div>
              @enderror
              </div>
          </div>

                        <div class="mb-4 row align-items-center">
                  <label for="Select" class="form-label col-sm-3 col-form-label">Semester</label>
                  <div class="col-sm-9">
                      <select id="Select" name="smt_id" class="form-control" required>
                          <option value="{{ $homeroom_teacher->semester->smt_id }}">
                              {{ $homeroom_teacher->semester->smt_semester }} | {{ $homeroom_teacher->semester->smt_school_year }}
                          </option>
                          @foreach ($semester as $smt)
                              <option value="{{ $smt->smt_id }}">
                                  {{ $smt->smt_semester }} | {{ $smt->smt_school_year }}
                              </option>
                          @endforeach
                      </select>
                      @error('smt_id')
                          <div id="sch_id" class="form-text text-danger">{{ $message }}</div>
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