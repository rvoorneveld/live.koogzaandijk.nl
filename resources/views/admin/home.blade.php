@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Messages</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    @foreach($message as $item)

                        @php
                            $strStatus = ((is_null($item->approved_at)) ? 'offline' : 'online');
                            $strStatusClass = (($strStatus == 'offline') ? 'danger' : 'success');
                        @endphp

                        <tr>
                            <td align="center">{{ $item->message_id }}</td>
                            <td>{{ $item->message_name }}</td>
                            <td>{{ $item->message_title }}</td>
                            <td align="center" class="{{ $strStatusClass }}"><a href="/admin/message/{{ $item->message_id }}/status/" title="change status">{{ $strStatus }}</a></td>
                            <td align="center">
                                <a href="/admin/message/{{ $item->message_id }}/edit">
                                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
