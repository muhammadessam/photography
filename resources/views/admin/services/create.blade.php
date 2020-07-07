@extends('admin.layout.layout')
@section('content')
    <div class="container p-4">
        <h3 class="col-12 text-right">إضافة خدمة جديدة</h3>
    </div>
    <div class="card col-8" style="margin: 0 auto;">
        <div class="card-body">
            <form action="{{route('admin.services.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" id="title" name="title" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">وصف الخدمة</label>
                    <input type="text" id="description" required name="description"class="form-control">
                </div>
                <div class="form-group">
                    <label for="icons">أيقونة</label>
                    <div class="d-flex align-items-center">
                        <div class="m-1">
                            <i class="fa fa-plus" id="icon-preview"></i>
                        </div>
                        <select id="icons" name="icon"  class="form-control">
                            
                        </select>
                    </div>
                    
                </div>
                <div class="row m-3">
                    <button type="submit" class="btn btn-success btn-block mt-3">انشاء</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')

    <script>
        var faIcons = [
            "address-book",
            "address-card",
            "angry",
            "arrow-alt-circle-down",
            "arrow-alt-circle-left",
            "arrow-alt-circle-right",
            "arrow-alt-circle-up",
            "bell",
            "bell-slash",
            "bookmark",
            "building",
            "calendar",
            "calendar-alt",
            "calendar-check",
            "calendar-minus",
            "calendar-plus",
            "calendar-times",
            "caret-square-down",
            "caret-square-left",
            "caret-square-right",
            "caret-square-up",
            "chart-bar",
            "check-circle",
            "check-square",
            "circle",
            "clipboard",
            "clock",
            "clone",
            "closed-captioning",
            "comment",
            "comment-alt",
            "comment-dots",
            "comments",
            "compass",
            "copy",
            "copyright",
            "credit-card",
            "dizzy",
            "dot-circle",
            "edit",
            "envelope",
            "envelope-open",
            "eye",
            "eye-slash",
            "file",
            "file-alt",
            "file-archive",
            "file-audio",
            "file-code",
            "file-excel",
            "file-image",
            "file-pdf",
            "file-powerpoint",
            "file-video",
            "file-word",
            "flag",
            "flushed",
            "folder",
            "folder-open",
            "frown",
            "frown-open",
            "futbol",
            "gem",
            "grimace",
            "grin",
            "grin-alt",
            "grin-beam",
            "grin-beam-sweat",
            "grin-hearts",
            "grin-squint",
            "grin-squint-tears",
            "grin-stars",
            "grin-tears",
            "grin-tongue",
            "grin-tongue-squint",
            "grin-tongue-wink",
            "grin-wink",
            "hand-lizard",
            "hand-paper",
            "hand-peace",
            "hand-point-down",
            "hand-point-left",
            "hand-point-right",
            "hand-point-up",
            "hand-pointer",
            "hand-rock",
            "hand-scissors",
            "hand-spock",
            "handshake",
            "hdd",
            "heart",
            "hospital",
            "hourglass",
            "id-badge",
            "id-card",
            "image",
            "images",
            "keyboard",
            "kiss",
            "kiss-beam",
            "kiss-wink-heart",
            "laugh",
            "laugh-beam",
            "laugh-squint",
            "laugh-wink",
            "lemon",
            "life-ring",
            "lightbulb",
            "list-alt",
            "map",
            "meh",
            "meh-blank",
            "meh-rolling-eyes",
            "minus-square",
            "money-bill-alt",
            "moon",
            "newspaper",
            "object-group",
            "object-ungroup",
            "paper-plane",
            "pause-circle",
            "play-circle",
            "plus-square",
            "question-circle",
            "registered",
            "sad-cry",
            "sad-tear",
            "save",
            "share-square",
            "smile",
            "smile-beam",
            "smile-wink",
            "snowflake",
            "square",
            "star",
            "star-half",
            "sticky-note",
            "stop-circle",
            "sun",
            "surprise",
            "thumbs-down",
            "thumbs-up",
            "times-circle",
            "tired",
            "trash-alt",
            "user",
            "user-circle",
            "window-close",
            "window-maximize",
            "window-minimize",
            "window-restore"
        ];

        faIcons.forEach(function(icon, index){
            $('#icons').append('<option value="'+icon+'">'+icon+'</option>')
        })

        $('#icons').on('change', function(){
            var selectedIcon = $(this).find('option:selected').val();
            $('#icon-preview').removeClass();
            $('#icon-preview').addClass('fa fa-'+selectedIcon);
        })
    </script>
    
@endsection
