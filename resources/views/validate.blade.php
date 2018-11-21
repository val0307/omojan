@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Validateテスト</div>
                <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('valcheck') }}">
                                     @csrf
                                     {{-- @csrf = csrf_field()  <!-- CSRFトークン：これを設定しないと、POST先で 419エラーになる --> --}}

@for ($i = 1; $i < 21; $i++)                                     
<div class="form-group row">
    <label for="col{{$i}}" class="col-md-4 col-form-label text-md-right">{{ __('項目'.$i) }}</label>

    <div class="col-md-6">
        <input id="col{{$i}}" type="text" class="form-control{{ $errors->has('col'.$i) ? ' is-invalid' : '' }}" name="col{{$i}}" value="{{ old('col'.$i) }}" autofocus>

        @if ($errors->has('col'.$i))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('col'.$i) }}</strong>
            </span>
        @endif
    </div>
</div>
@endfor                                     
                                     
                                     
                                     
                                     
                                     <button type="submit" class="btn btn-primary">
                                        {{ __('チェック') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
