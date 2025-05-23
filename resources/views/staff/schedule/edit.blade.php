@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Edit Jadwal Pelajaran
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Edit Jadwal</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Hari</label>
                  <div class="col-sm-9">
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="sch_day"  oninvalid="this.setCustomValidity ('Hari Wajib Diisi')"
                    onchange="this.setCustomValidity('')" required>
                    @if ($editSchedule->sch_day == "Senin")
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    @elseif($editSchedule->sch_day == "Selasa")
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    @elseif($editSchedule->sch_day == "Rabu")
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    @elseif($schedule->sch_day == "Kamis")
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    @else
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    @endif
                    </select>
                  </div>
                  @error('sch_day')
                    <div>error</div>
                  @enderror
                </div>

                {{-- <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Kelas</label>
                  <div class="col-sm-9">
                    <input type="text" name="sch_class_id" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Kelas Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('sch_class_id')
                    <div>error</div>
                  @enderror
                </div> --}}

                <div class="mb-4 row align-items-center">
                  <label for="Select" class="form-label col-sm-3 col-form-label">Kelas</label>
                  <div class="col-sm-9">
                  <select id="Select" name="cls_id" class="form-control" required>
                  <option   value="{{$editSchedule->classes->cls_id}}">{{$editSchedule->classes->cls_level}} {{$editSchedule->classes->cls_number}}</option>
                  @foreach ($classes as  $Classes)
                    <option value="{{$Classes->cls_id}}">{{$Classes->cls_level}} {{$Classes->cls_number}}</option>
                  @endforeach
                  </select>
                  @error('sch_class_id')
                      <div id="sch_id" class="form-text">{{ $message }}</div>
                  @enderror
                  </div>
              </div>

                <div class="mb-4 row align-items-center">
                  <label for="Select" class="form-label col-sm-3 col-form-label">Mata Pelajaran</label>
                  <div class="col-sm-9">
                  <select id="Select" name="sbj_id" class="form-control" required>
                  {{-- <option hidden  value="{{$editSchedule->sch_subject_id}}">{{$editSchedule->subject->sbj_name_subject}}</option> --}}
                  <option hidden  value="{{$editSchedule->subject->sbj_id}}">{{$editSchedule->subject->sbj_name}}</option>
                  @foreach ($Subject as  $Subject)
                    <option value="{{$Subject->sbj_id}}">{{$Subject->sbj_name}}</option>
                  @endforeach
                  </select>
                  @error('sch_subject_id')
                      <div id="sch_id" class="form-text">{{ $message }}</div>
                  @enderror
                  </div>
              </div>

              <div class="mb-4 row align-items-center">
                <label for="Select" class="form-label col-sm-3 col-form-label">Guru</label>
                <div class="col-sm-9">
                <select id="Select" name="tch_id" class="form-control" required>
                <option   value="{{$editSchedule->teacher->tch_id}}">{{$editSchedule->teacher->tch_name}}</option>
                @foreach ($teacher as  $teacher)
                  <option value="{{$teacher->tch_id}}">{{$teacher->tch_name}}</option>
                @endforeach
                </select>
                @error('sch_teacher_id')
                    <div id="sch_id" class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="mb-4 row align-items-center">
              <label for="Select" class="form-label col-sm-3 col-form-label">Semester</label>
              <div class="col-sm-9">
              <select id="Select" name="tch_id" class="form-control" required>
              <option   value="{{$editSchedule->semester->smt_id}}">{{$editSchedule->semester->smt_name}}</option>
              @foreach ($semester as $Semester)
                <option value="{{$Semester->smt_id}}">{{$Semester->smt_name}}</option>
              @endforeach
              </select>
              @error('sch_semester_id')
                  <div id="sch_id" class="form-text">{{ $message }}</div>
              @enderror
              </div>
          </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Jam Mulai</label>
                  <div class="col-sm-9">
                    <input type="time" name="sch_start_time" value="{{$editSchedule->sch_start_time}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Jam Mulai Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('sch_start_time')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Jam Selesai</label>
                  <div class="col-sm-9">
                    <input type="time" name="sch_end_time" value="{{$editSchedule->sch_end_time}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Jam Selesai Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('sch_end_time')
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