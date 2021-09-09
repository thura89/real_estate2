@extends('backend.layouts.app')
@section('title', 'Create Agent User')
@section('agent-user-active', 'mm-active')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Create Agent User
                </div>
            </div>
        </div>

    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                @include('backend.layouts.flash')
                <form action="{{ route('admin.agent-user.store')}}" method="POST" id="create">
                    @csrf
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                        
                    </div>
                    <div class="form-group">
                        <label for="agent_type">Agent Type</label>
                        <select name="agent_type" class="form-control">
                            @foreach (config('const.agent_type') as $key => $agent)
                                <option value="{{$key}}">{{$agent}}</option>    
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary back-btn">Back</button>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\CreateAgentUserRequest','#create') !!}
    <script>
        $(document).ready(function() {
           
        });
    </script>

@endsection
