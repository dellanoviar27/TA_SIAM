@extends('staff.master_curriculum')

@push('link')
    
@endpush

@section('title')
    Edit Jadwal Pelajaran | SIAM Al-Mu'min
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
                <option   value="{{$editSchedule->teacher->tch_id}}">{{$editSchedule->teacher->user->name ?? '-' }}</option>
                @foreach ($teacher as  $teacher)
                  <option value="{{$teacher->tch_id}}">{{ $teacher->user->name ?? '-' }}</option>
                @endforeach
                </select>
                @error('sch_teacher_id')
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

                 <div class="mb-4 row align-items-center">
              <label for="Select" class="form-label col-sm-3 col-form-label">Semester</label>
              <div class="col-sm-9">
             <select name="smt_id" class="form-control" required>
                  @foreach ($semester as $Semester)
                      <option value="{{ $Semester->smt_id }}"
                          {{ $Semester->smt_id == $editSchedule->sch_semester_id ? 'selected' : '' }}>
                          {{ $Semester->smt_semester }}
                      </option>
                  @endforeach
              </select>
              @error('sch_semester_id')
                  <div id="sch_id" class="form-text">{{ $message }}</div>
              @enderror
              </div>
          </div>

          {{-- Checkbox Tampilkan --}}
              <div class="mb-4 row align-items-center">
                <label for="sch_is_visible" class="form-label col-sm-3 col-form-label">Tampilkan?</label>
                <div class="col-sm-9">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="sch_is_visible" name="sch_is_visible" value="1"
                      {{ $editSchedule->sch_is_visible ? 'checked' : '' }}>
                    <label class="form-check-label" for="sch_is_visible">Tampilkan ke Guru dan Siswa</label>
                  </div>
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