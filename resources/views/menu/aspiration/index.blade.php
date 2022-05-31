@extends('layouts.main')

@section('content')

<h3>{{ __('lang.aspiration') }}</h3>
<div id="aspirationAlerts" role="alert" style="display: none;" class="alert alert-success alert-dismissible fade show">
    <strong id="aspirationAlertsContent"></strong> 
    <button type="button" class="close" onclick="closeElement('aspirationAlerts')" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="card" style="background-color: #E9ECEF">
    <div class="card-body">
        <form action="{{ route('aspiration.store') }}" method="post" id="aspirationForm">
            @csrf
            <label for="categories">{{ __('lang.category') }}</label>
            <select name="category" id="categories" class="form-control">
                <option value="complaint">{{ __('lang.complaint') }}</option>
                <option value="suggestion">{{ __('lang.suggestion') }}</option>
                <option value="other">{{ __('lang.other') }}</option>
            </select>
            <span style="color:red" id="category"></span>

            <label for="titles" class="mt-3">{{ __('lang.title') }}</label>
            <input type="text" name="title" id="titles" onblur="validate_title(this.value)" class="form-control">
            {{-- <input type="text" name="title" id="titles"  class="form-control"> --}}
            <span style="color:red" id="title"></span>

            <label for="descriptions" class="mt-3">{{ __('lang.description') }}</label>
            <textarea name="description" id="descriptions" onblur="validate_description(this.value)" cols="30" rows="10" class="form-control"></textarea>
            {{-- <textarea name="description" id="descriptions" cols="30" rows="10" class="form-control"></textarea> --}}
            <span style="color:red" id="description"></span>
            
            <button type="submit" class="btn btn-primary mt-3" style="float: right">{{ __('lang.submit') }}</button>
            <div id="aspirationLoader"></div>
        </form>
    </div>
</div>

@endsection
