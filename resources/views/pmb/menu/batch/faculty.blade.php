<div style="display: none;" id="jurusan">
    <div   div class="card" style="background-color: #E9ECEF;margin-bottom:30px">
        <h5 class="mt-3 text-center">{{ __('lang.faculty') }}</h5>
        <div class="card-body">
            
            <div class="row">
                <div class="col-6">
                    <label for="father_name" class="form-label">{{ __('lang.name_ktp') }} : </label>
                    <input type="text" disabled value="{{ Auth::user()->name }}" class="form-control" aria-describedby="emailHelp" required>
                    <span id="Fname_error" style="color:red"></span>
                </div>
                <div class="col-6">
                    <label for="father_name" class="form-label">{{ __('lang.batch') }} : </label>
                    <input type="text" disabled value="{{ $ActiveBatchName }}" class="form-control" required>
                    <span id="Fname_error" style="color:red"></span>
                </div>
                <div class="col-6 mt-3">
                    <label for="father_name" class="form-label">{{ __('lang.price') }} : </label>
                    <input type="text" disabled value="{{ $ActiveBatchPrice }}" class="form-control" required>
                    <span id="Fname_error" style="color:red"></span>
                </div>
                
                <div class="col-6 mt-3">
                    <label for="father_citizenship" class="form-label">{{ __('lang.faculty') }} : </label>
                    <select name="father_citizenship" id="father_citizenship" class="form-control" required>
                        @foreach($countries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="father_citizenship" class="form-label">{{ __('lang.program_studi') }} : </label>
                    <select name="father_citizenship" id="father_citizenship" class="form-control" required>
                        @foreach($countries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="father_citizenship" class="form-label">{{ __('lang.waktu_kuliah') }} : </label>
                    <select name="father_citizenship" id="father_citizenship" class="form-control" required>
                        @foreach($countries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
                                            
        </div>
    </div>
 
    
    <button type="button" class="btn btn-primary mt-3" onclick="batchPaginateForm(3)" style="float: left">{{ __('lang.previous') }}</button>
    <button type="button" class="btn btn-primary mt-3" onclick="batchPaginateForm(5)" style="float: right">{{ __('lang.next') }}</button>
</div>
