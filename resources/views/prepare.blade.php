@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">対局準備</div>

                <div class="card-body">
                    <p>{{ __('参加者') }}</p>
                    {{--@foreach(ループ変数) ～ @endforeach: ループ処理 --}}
{{--
                    @foreach ($taikyk as $taikyk)
                    <div class="row">
                            <div class="col">
                                {{ $taikyk->name }}
                            </div>
                    </div>
                    @endforeach
--}}
                    {{--@forelse(ループ変数) ～ @endforelse: ループ処理 --}}
                    @forelse ($taikyk as $taikyk)
                    <div class="row">
                            <div class="col">
                                {{ $taikyk->name }}
                            </div>
                    </div>
                    @empty
                    <p>{{ __('なし') }}</p>
                    @endforelse

                    <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('taikyoku.index') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                                {{ __('開始') }}
                                    </button>
                                </form>
                            </div>
                            <div class="col">
                                <form method="POST" action="{{ route('taikyoku.destroy', Auth::user()->name)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('退室') }}
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
