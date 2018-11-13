@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">札マスタ CSVアップロード</div>

                <div class="card-body">
                        <div class="row">
                            <div class="col">
                                    <h4>CSVファイルを選択してください</h4>
                                    <form role="form" method="post" action="{{ route('import') }}" enctype="multipart/form-data">
                                     @csrf
                                    <input type="file" name="csv_file" id="csv_file">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-success">アップロード</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
