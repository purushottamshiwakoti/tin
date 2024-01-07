$(".deleteArena").on('click','a.ajaxDelete', function (e) {
    e.preventDefault();
    var $request = new RequestManager.Ajax();
    var confirms;
    if ($(this).attr('data-confirm')) {
        confirms = confirm($(this).attr('data-confirm'));
    }
    else {
        confirms = confirm('Are you sure you want to delete the selected item ?');
    }

    if (!confirms) {
        e.preventDefault();
        return false;

    }
    var config = {
        url: $(this).attr('href'),
        data: {'_delete_token': $(this).attr('data-token')},
        type: 'DELETE'
    };
    var This = $(this);


    $request.Html(config).done(function (response) {
        if (response == '1') {
            toastr.success('Item Deleted Successfully!');
            //alert(data);
            if (This.data('prev')) {
                /* console.log('should delete previous');
                 console.log(This.closest('.deleteBox').prev('.deleteBox'));*/
                This.closest('.deleteBox').prev('.deleteBox').addClass('deleting').hide(2000);
            }
            This.closest('.deleteBox').addClass('deleting').hide(2000);
        }
        else {
            toastr.error('Delete Failed!');
            // alert('Delete Failed');
        }
        //LOADER.finish();
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
        console.log(errorThrown)
    });

    e.preventDefault();
    /* e.stopPropagation();*/
});

var updateOutput = function(e) {
    var $request = new RequestManager.Ajax();
    console.log($(this).nestable('serialize'));
    var config = {
        url: $(this).attr('data-href')+'/order',
        data: {'data':$(this).nestable('serialize')},
        type: 'POST'
    };
    var This = $(this);


    $request.Html(config).done(function (response) {
        if (response == '1') {
            //alert(data);
            toastr.success("Menu Items Updated.")
        }
        else {
            toastr.error("Something went Wrong!")
        }
        //LOADER.finish();
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
        console.log(errorThrown)
    });
};
// activate Nestable for list 2
$('#menu-items').nestable({
    group: 1,
    noDragClass:'no-drag'
})
    .on('change', updateOutput);
$(document).ready(function() {
    // Single swithces
    var elemsingle = document.querySelector('.js-single');
    if(elemsingle)
    {
        var switchery = new Switchery(elemsingle, {color: '#4099ff', jackColor: '#fff'});
    }


    // Tagging Suppoort
    $(".js-example-tags").select2({
        tags: true
    });
    $(".select2-tags").select2({
        tags: true
    });
    $(".js-example-basic-single").select2();
    $(".select2-single").select2();

    var rules = {
        errorClass:'form-control-danger input-danger text-danger error',
        errorElement:"p",
        errorPlacement: function (error, element) {
            var el = element.parent();
            error.appendTo(el);
            console.log(error);
            console.log(element);
            toastr.error(element.attr('name')+" : "+error.text());
        }

    };
    $("form#main").validate(rules);

    addWYSIWG();

    $('input.dates').datepicker({
        format:'yyyy-mm-dd',
    });
    $(document).on('change','input.start_date',function () {
        var date = $(this).datepicker('getDate','+1d');
        date.setDate(date.getDate()+1);
        $(this).closest('.row').find('.end_date').datepicker('setDate',date);
    });
});

function setImageValue(url){
    $('.mce-btn.mce-open').parent().find('.mce-textbox').val(url);
}
function addWYSIWG() {
    tinymce.init({
        menubar: false,
        selector: 'textarea.tinymce',
        // skin: 'voyager',
        min_height: 200,
        resize: 'vertical',
        plugins: 'link, image, code, table, textcolor, lists',
        extended_valid_elements: 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
        file_browser_callback: function file_browser_callback(field_name, url, type, win) {
            if (type == 'image') {
                $('#upload_file').trigger('click');
            }
        },
        // fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        toolbar: 'fontsizeselect | styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code',
        convert_urls: false,
        image_caption: true,
        image_title: true,
        // style_formats: [
        //     {title: 'Image Left', selector: 'img', styles: {
        //             'float' : 'left',
        //             'margin': '0 10px 0 10px'
        //         }},
        //     {title: 'Image Right', selector: 'img', styles: {
        //             'float' : 'right',
        //             'margin': '0 10px 0 10px'
        //         }}
        // ],
        // image_advtab: true
    });
    // tinymce.init({
    //     selector: 'textarea.tinymce',
    //     height: 200,
    //     theme: 'modern',
    //     plugins: [
    //         'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    //         'searchreplace wordcount visualblocks visualchars code fullscreen',
    //         'insertdatetime media nonbreaking save table contextmenu directionality',
    //         'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
    //     ],
    //     toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    //     toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
    //     image_advtab: true
    // });
}

$('#my_form').on('submit',function (e) {
    e.preventDefault();
   var formData = new FormData($(this)[0]);
   $.ajax({
       url:$('#my_form').attr('action'),
       type:'POST',
       data:formData,
       success:function (response) {
           $('.mce-btn.mce-open').parent().find('.mce-textbox').val(response);
       },
       contentType: false,
       processData: false,
       cache: false
   });
});
function setSwitchery(el, checkedBool) {
        if (typeof Event === 'function' || !document.fireEvent) {
            var event = document.createEvent('HTMLEvents');
            event.initEvent('change', true, true);
            el.dispatchEvent(event);
        } else {
            el.fireEvent('setSwitchery');
        }
}
