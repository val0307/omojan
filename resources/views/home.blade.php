@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ホーム</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @else
                        <div class="alert alert-success" role="alert">
                            session.status.false!
                        </div>
                    @endif
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('taikyoku.index') }}">
                                     @csrf
                                     {{-- @csrf = csrf_field()  <!-- CSRFトークン：これを設定しないと、POST先で 419エラーになる --> --}}
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('参加') }}
                                    </button>
                                </form>
                            </div>
                            <div class="col">
                                <form method="POST" action="{{ route('rireki') }}">
                                    {{ csrf_field() }} <!-- CSRFトークン：これを設定しないと、POST先で 419エラーになる -->
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('戦歴') }}
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
