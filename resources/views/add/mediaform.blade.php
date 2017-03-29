@extends('layout')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <h1>Stap 1. Upload uw media</h1>

            <form class="dropzone" id="addMediaForm" method="POST" action="/save-media-file">

                {{ csrf_field() }}

                <input type="hidden" name="files" :value="files">

                <p class="bg-box bg-info">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Gebruik onderstaande knop Upload afbeelding om te beginnen.
                </p>

            </form>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <button class="btn btn-danger pull-left js-dropzone-upload js-button-upload">Upload afbeelding</button>
            <div class="loader pull-right js-loader"><span></span><span></span><span></span></div>
            <button class="btn btn-primary pull-right js-button-next" @click="gotoNextStep" style="display:none;">Volgende</button>
        </div>
    </div>
@stop

@section('scripts.footer')
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>

        Dropzone.autoDiscover = false;

        var files = [];

        var Dropzone = new Dropzone('.dropzone', {
            'paramName' : 'photovideo',
            'acceptedFiles' : 'image/*,video/*',
            'addRemoveLinks' : true,
            'clickable' : '.js-dropzone-upload',
            'dictDefaultMessage' : '',
            'dictRemoveFile' : 'verwijder',
            'dictCancelUpload' : 'annuleren',
            'dictCancelUploadConfirmation' : 'Wilt u dit bestand annuleren?',
            'success' : function( file, convertedFileName ){
                jQuery('.js-loader').hide();
                jQuery('.js-button-next').show();
                files.push(convertedFileName);
            }
        });

        new Vue({
            el: '#app',
            data: {
                files: ''
            },
            methods : {
                gotoNextStep : function() {

                    this.files = btoa(JSON.stringify(files));

                    setTimeout(function(){
                        var addMediaForm = document.getElementById('addMediaForm')
                        addMediaForm.action = '/save-step-media';
                        addMediaForm.submit();
                    },500);

                }
            }
        });

    </script>
@stop