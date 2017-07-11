
$(function(){
    function getSuffix(path){
        var fileName=path.split('.');
        return fileName[fileName.length-1].toLocaleLowerCase();
    }

    function getLogo(suffix){
        var logo={
            audio:['mp3', 'wma'],
            css:['css'],
            csv:['csv'],
            html:['htm', 'html', 'phtml'],
            image:['jpg', 'gif', 'jpeg', 'bmp', 'png'],
            javascript:['js'],
            log:['log'],
            pdf:['pdf'],
            php:['php'],
            plain:['txt'],
            sql:['sql'],
            word:['doc', 'docx'],
            excel:['xls', 'xlsx'],
            powerpoint:['ppt', 'pptx'],
            rar:['rar', 'zip', 'tar'],
            video:['mp4', 'avi']
        };
        for(var key in logo){
            if(logo[key].indexOf(suffix)>-1){
                return key;
            }
        }
        return 'unknown';
    }

    function getSrc(filePath){
        var src = '';
        var suffix = getSuffix(filePath);
        var images = ['jpg', 'gif', 'jpeg', 'bmp', 'png'];
        if(images.indexOf(suffix) > -1){
            src = filePath;
        }else{
            var logo = getLogo(suffix);
            src = '/plugins/ckfinder/skins/core/file-icons/128/' + logo + '.png';
        }
        return src;
    }

    // ckfinder form-input
    for (var i = $('[ckfinder="modal"]').length - 1; i >= 0; i--) {
        var _this = $($('[ckfinder="modal"]')[i]);
        if (_this.val()) {
            var img = '';
            $.each(_this.val().split(','), function (key, val) {
                var src = getSrc(val);
                img += '<img style="max-width:60%;max-height:80px;margin:20px;" src="'+ src +'" />'
            });
            _this.after(img);
        }
    }

    $('[ckfinder="modal"]').click(function () {
        var _this = $(this);
        CKFinder.modal({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = [], img = '', multiple = _this.attr('data-multiple');
                    if (multiple) {
                        evt.data.files.each(function (val) {
                            file.push(val.getUrl());
                            var src = getSrc(val.getUrl());
                            img += '<img style="max-width:60%;max-height:80px;margin:20px;" src="' + src + '" />';
                        });
                    } else {
                        file = evt.data.files.first().getUrl();
                        var src = getSrc(file);
                        img = '<img style="max-width:60%;max-height:80px;margin:20px;" src="' + src + '" />';
                    }
                    _this.nextAll('img').remove();
                    _this.val(file).after(img);
                });

                finder.on('file:choose:resizedImage', function (evt) {
                    _this.prev().val(evt.data.resizedUrl);
                    _this.after('<img style="max-width:60%;max-height:80px;margin:20px;" src="' + evt.data.resizedUrl + '" />');
                });
            }
        });
        return false;
    });

});