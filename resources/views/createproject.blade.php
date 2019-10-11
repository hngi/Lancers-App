@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create project</div>
                <div class="card-body">       
                    <form method="POST" action="/projects">
                        @csrf
                        <div class="row form-group">                            
                            <label for="" class="col-md-4 col-form-label text-md-right">Enter project name</label>
                            <div class="col-md-6">
                                <input name="title" type="text" class="form-control" autofocus>
                            </div>
                            <label for="" class="col-md-4 col-form-label text-md-right">Enter project description</label>
                            <div class="col-md-6">
                                <input name="description" type="text" class="form-control" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <br>
                                <button  class="btn btn-primary btn-block">Create Project</button>
                            </div>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
