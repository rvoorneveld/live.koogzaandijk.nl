@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit: @{{ title }}</div>

                    <div class="panel-body">
                        <form method="POST" action="/admin/message/{{ $message->message_id }}/">

                            {{ csrf_field() }}

                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <label for="message_name">Name</label>
                                <input type="text" name="message_name" class="form-control" id="message_name" value="{{ $message->message_name }}" v-on="title ">
                            </div>

                            <div class="form-group">
                                <label for="message_title">Title</label>
                                <input v-model="title" type="text" name="message_title" class="form-control" id="message_title" value="{{ $message->message_title }}">
                            </div>

                            @php
                                if(! is_null($message->message_media)) {
                                    $media = explode('||',$message->message_media);
                                }
                            @endphp

                            @if(! empty($media) && is_array($media))
                                @foreach($media as $item)
                                    <img class="img-thumbnail" src="/upload/pending/{{ $item }}" style="height: 150px; margin-bottom:15px; margin-right:15px;" alt="" title="" />
                                @endforeach
                            @endif

                            <div class="form-group">
                                <label for="status">Status</label>
                                @php
                                    $strOfflineChecked = ((is_null($message->approved_at)) ? ' selected="selected"' : '');
                                    $strOnlineChecked = ((is_null($message->approved_at)) ? '' : ' selected="selected"');
                                @endphp
                                <select name="status" class="form-control" id="status">
                                    <option value="offline"{{ $strOfflineChecked }}>Offline</option>
                                    <option value="online"{{ $strOnlineChecked }}>Online</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts.footer')
    <script>

        new Vue({
            el: '#app',
            data: {
                title: '{{ $message->message_title }}'
            }
        });

    </script>
@stop