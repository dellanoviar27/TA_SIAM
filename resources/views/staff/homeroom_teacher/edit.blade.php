@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Edit Wali Kelas
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
                {{-- <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Tingkatan Kelas</label>
                  <div class="col-sm-9">
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="cls_level"  oninvalid="this.setCustomValidity ('Tingkatan Wajib Diisi')"
                    onchange="this.setCustomValidity('')" required>
                    @if ($Classes->cls_level == "Idadiya")
                    <option value="Idadiya">Idadiya</option>
                    <option value="Awwaliyah">Awwaliyah</option>
                    <option value="Wustho">Wustho</option>
                    <option value="Ula">Ula</option>
                    @elseif($Classes->cls_level == "Awwaliyah")
                    <option value="Idadiya">Idadiya</option>
                    <option value="Awwaliyah">Awwaliyah</option>
                    <option value="Wustho">Wustho</option>
                    <option value="Ula">Ula</option>
                    @elseif($Classes->cls_level == "Wustho")
                    <option value="Idadiya">Idadiya</option>
                    <option value="Awwaliyah">Awwaliyah</option>
                    <option value="Wustho">Wustho</option>
                    <option value="Ula">Ula</option>
                    @else
                    <option value="Idadiya">Idadiya</option>
                    <option value="Awwaliyah">Awwaliyah</option>
                    <option value="Wustho">Wustho</option>
                    <option value="Ula">Ula</option>
                    @endif
                    </select>
                  </div>
                  @error('cls_level')
                    <div>error</div>
                  @enderror
                </div> --}}

                {{-- <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nomor Kelas</label>
                  <div class="col-sm-9">
                    <input type="text" name="cls_number" value="{{$Classes->cls_number}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nomor Kelas Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('cls_number')
                    <div>error</div>
                  @enderror
                </div> --}}

                {{-- <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Kelas Umum</label>
                  <div class="col-sm-9">
                    <input type="text" name="cls_general_level" value="{{$Classes->cls_general_level}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nomor Kelas Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('cls_general_level')
                    <div>error</div>
                  @enderror
                </div> --}}

                {{-- <div class="mb-4 row align-items-center">
                  <label for="Select" class="form-label col-sm-3 col-form-label">Wali Kelas</label>
                  <div class="col-sm-9">
                  <select id="Select" name="tch_id" class="form-control" required>
                  <option   value="{{$$Classes->teacher->tch_id}}">{{$Classes->teacher->tch_name}}</option>
                  @foreach ($teacher as  $teacher)
                    <option value="{{$teacher->tch_id}}">{{$teacher->tch_name}}</option>
                  @endforeach
                  </select>
                  @error('cls_teacher_id')
                      <div id="cls_id" class="form-text">{{ $message }}</div>
                  @enderror
                  </div>
              </div> --}}

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
              <option   value="{{$homeroom_teacher->teacher->tch_id}}">{{$homeroom_teacher->teacher->tch_name}}</option>
              @foreach ($teacher as  $teacher)
                <option value="{{$teacher->tch_id}}">{{$teacher->tch_name}}</option>
              @endforeach
              </select>
              @error('hrt_teacher_id')
                  <div id="hrt_id" class="form-text">{{ $message }}</div>
              @enderror
              </div>
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