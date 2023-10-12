@extends('layouts.app')
@section('title', 'Forgot password')
@section('content')

<div class="container">
    <hr>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <a href="{{route('login')}}" class="btn btn-outline-primary btn-sm mb-3">Retour</a>
        </div> <!--/col-12-->
    </div><!--/row-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="post">
                    @csrf
                    <div class="card-header">Forgot password</div>
                    <div class="card-body">
                        <div class="control-grup col-12">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection