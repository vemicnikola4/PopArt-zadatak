@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('All Custumers') }}</div>
                
                <div class="card-body">
                    @if (session('msg'))
                    <div class="alert alert-{{ __(session('alert_type')) }}" role="alert">
                        {{ __(session('msg')) }}
                    </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __ ('Last Name')}}</th>
                                <th scope="col">{{ __('Address') }}</th>
                                <th scope="col">{{ __('Phone number') }}</th>
                                <th scope="col">
                                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">{{ 'Back' }}</a>
                                </th>
    
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ( $custumers as  $custumer)
                            <tr>
                                <th scope="row">
                                    <div class="me-3">
                                        {{ ( $custumers->currentPage() - 1) *  $custumers->perPage() + $loop->iteration }}
                                     </div>
                                </th>
                                <td>{{ $custumer->name }}</td>
                                <td>{{ $custumer->last_name }}</td>
                                <td>{{ $custumer->location }}</td>
                                <td>{{ $custumer->phone_number }}</td>
                                <td>
                                    <a href="{{ route('admin.custumer.edit',['custumer'=>$custumer->id]) }}" class="btn btn-success">{{ __('edit') }}</a>
                                </td>
                                <td>
                                    <a href={{ route('admin.custumer.delete',['custumer'=>$custumer->id]) }} class="btn btn-danger">{{ __ ('delete') }}</a>
                                </td>
                                
                            </tr>
                     
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection