
    $(document).ready(function(){

        //script for individual and composite radio buttons
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='upload_type']:checked").val();
            if(radioValue == 'individual'){
                $('#show-composite').hide();
                $('#show-individual').show();
            }else if(radioValue == 'composite'){
                $('#show-individual').hide();
                $('#show-composite').show();
            }
        });

        //script to delete new images
        $(document.body).on('click', '.deleteImage', function(){
            var element = $(this).closest("span");
            var imageName = $(this).find('img').attr('alt');
            var imageID = $(this).find('img').attr('id');
            var form_data = new FormData();
            form_data.append('image', imageName);
            form_data.append('img_id', imageID);
            $.ajax({
                type: 'POST',
                url: base_url+'doctor/deleteImage',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(data) {
                    if(data == 1){
                        element.html('');
                    }
      
                }
            });
        });

        //script to delete old images
        $(document.body).on('click', '.deleteImageD', function(){
            var imageHtml = '';
            var element = $(this).closest("span");
            var imageName = $(this).find('img').attr('alt');
            var imageID = $(this).find('img').attr('id');
            element.html('');
            imageHtml += '<span id="'+imageID+'" name="'+imageName+'"></span>'
            $(".toDeleteImagesList").prepend(imageHtml);
        });
    });  

    //drag & drop or upload script
    var img_url = base_url+"assets/uploads/images/";
    var static_img_url = base_url+"assets/images/";
    $(document).ready(function () {
        resetForms();
        var obj = $(".section-drop-image");
        obj.on("dragover", function(e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).css("border", "1px solid lightblue");
        });
        obj.on("drop", function(e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).css("border", "1px solid lightblue");
            var type = $(this).attr("data-type");
            // alert(type);
            var form_data = new FormData();
            var files_list = e.dataTransfer.files;
            for (var i=0; i< files_list.length;i++){
                form_data.append('file[]', files_list[i]);
            }
            // Display the key/value pairs
            // for (var pair of form_data.entries()) {
            //     console.log(pair[0]+ ', ' + pair[1]); 
            // }
            // console.log(form_data);
            ajax_file_upload(form_data, type);
        });
        $(".filesUploadBtn").on('change', function() {
            var type = $(this).attr("data-type");
            var form_data = new FormData();
            var files_list = this.files;
            for (var i=0; i< files_list.length; i++){
                form_data.append('file[]', files_list[i]);
            }
            ajax_file_upload(form_data, type);
        });
    });

    function resetForms() {
        for (i = 0; i < document.forms.length; i++) {
            document.forms[i].reset();
        }
    }

    //upload files function
    function ajax_file_upload(form_data, type) {
        var imageHtml = '';
        if(form_data != undefined) {
            $.ajax({
                type: 'POST',
                url: base_url+'doctor/upload',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(data) {
                    if(type == "dropintrafile"){
                        $.each(JSON.parse(data), function(index, val) {
                            imageHtml += '<div class="uk-width-medium-1-5"><img id="'+val+'" class="border-radius-15p pb-5p newData" src="'+img_url+val+'" alt="'+val+'"></div>';
                        });
                        $(".individual-intra-image-preview >.uk-width-medium-2-5").before(imageHtml);
                    }else if(type == "dropopgfile"){
                        $.each(JSON.parse(data), function(index, val) {
                            imageHtml += '<div class="uk-width-medium-1-5"><img id="'+val+'" class="border-radius-15p pb-5p newData" src="'+img_url+val+'" alt="'+val+'"></div>';
                        });
                        $(".individual-opg-image-preview >.uk-width-medium-2-5").before(imageHtml);
                    }else if(type == "droplateralfile"){
                        $.each(JSON.parse(data), function(index, val) {
                            imageHtml += '<div class="uk-width-medium-1-5"><img id="'+val+'" class="border-radius-15p pb-5p newData" src="'+img_url+val+'" alt="'+val+'"></div>';
                        });
                        $(".individual-lateral-image-preview >.uk-width-medium-2-5").before(imageHtml);
                    }else if(type == "dropstlfile"){
                        $("#drop-stl-file").hide();
                        $.each(JSON.parse(data), function(index, val) {
                            imageHtml += '<span id="stl_'+index+'"><div class="upload-file-list uk-flex uk-flex-between uk-margin-top"><p class="m-0p newData">'+val+'</p><a id="delete_img_'+index+'" class="deleteImage"><img src="'+static_img_url+'delete-icon.svg" alt="'+val+'"></a></div></span>';
                        });
                        $(".individual-stl-preview #drop-stl-files-list").prepend(imageHtml);
                        $("#drop-stl-files-list").show();
                        $('#stl-choose-file').attr("style", "display: none !important");
                        $('#stl-drag-drop-bottom').show();
                    }else{
                        $("#drop-composite-file").hide();
                        $.each(JSON.parse(data), function(index, val) {
                            imageHtml += '<span id="composite_'+index+'"><div class="upload-file-list uk-flex uk-flex-between uk-margin-top"><p class="m-0p newData">'+val+'</p><a id="delete_img_'+index+'" class="deleteImage"><img src="'+static_img_url+'delete-icon.svg" alt="'+val+'"></a></div></span>';                        
                        });
                        $("#drop-composite-files-list").prepend(imageHtml);
                        $("#drop-composite-files-list").show();
                        $('#composite-choose-file').attr("style", "display: none !important");
                        $('#composite-drag-drop-bottom').show();
                    }
                }
            });
        }
    }

    //script to submit form data
    $("#addScanForm").submit(function(e) {
        $("#create").text('Saving...');
        var imageName = '';
        var form_data = new FormData();
        e.preventDefault();
        form_data.append('patient_id', $('#patient_id').val());
        form_data.append('title', $('#scan_title').val());
        form_data.append('upload_type', $('input[name="upload_type"]:checked').val());
        $(".individual-intra-image-preview >.uk-width-medium-1-5").each(function(index) {
            imageName = $(this).find('.newData').attr('alt');
            form_data.append('intrafiles[]', imageName);
        });
        $(".individual-opg-image-preview >.uk-width-medium-1-5").each(function(index) {
            imageName = $(this).find('.newData').attr('alt');
            form_data.append('opgfiles[]', imageName);
        });
        $(".individual-lateral-image-preview >.uk-width-medium-1-5").each(function(index) {
            imageName = $(this).find('.newData').attr('alt');
            form_data.append('lateralfiles[]', imageName);
        });
        $("#drop-stl-files-list p").each(function(index) {
            imageName = $(this).text();
            form_data.append('stlfiles[]', imageName);
        });
        $("#drop-composite-files-list p").each(function(index) {
            imageName = $(this).text();
            form_data.append('compositefiles[]', imageName);
        });
        $.ajax({
            type: 'POST',
            url: base_url+'doctor/submitScan',
            contentType: false,
            processData: false,
            data: form_data,
            success:function(data) {
                var modal = UIkit.modal("#success-model");
                modal.show();
                $("#create").text('Create');
  
            }
        });
    });

    $('#model-close').click(function(){
        UIkit.modal('#success-model').hide();
    });

    //script to submit updated data
    $("#editScanForm").submit(function(e) {
        $("#update").text('Updating...');
        var imageName = '';
        var imageID = '';
        var form_data = new FormData();
        var deleteImagesData = new FormData();
        e.preventDefault();
        form_data.append('scan_id', $('#scan_id').val());
        form_data.append('patient_id', $('#patient_id').val());
        form_data.append('title', $('#scan_title').val());
        form_data.append('upload_type', $('input[name="upload_type"]:checked').val());
        $(".individual-intra-image-preview >.uk-width-medium-1-5").each(function(index) {
            if(($(this).find('.newData').attr('alt'))){
                imageName = $(this).find('.newData').attr('alt');
                form_data.append('intrafiles[]', imageName);
            }
        });
        $(".individual-opg-image-preview >.uk-width-medium-1-5").each(function(index) {
            if(($(this).find('.newData').attr('alt'))){
                imageName = $(this).find('.newData').attr('alt');
                form_data.append('opgfiles[]', imageName);
            }
        });
        $(".individual-lateral-image-preview >.uk-width-medium-1-5").each(function(index) {
            if(($(this).find('.newData').attr('alt'))){
                imageName = $(this).find('.newData').attr('alt');
                form_data.append('lateralfiles[]', imageName);
            }
        });
        $("#drop-stl-files-list >span >div").each(function(index) {
            if($(this).find('.newData').text()){
                imageName = $(this).find('.newData').text();
                form_data.append('stlfiles[]', imageName);
            }
        });
        $("#drop-composite-files-list >span >div").each(function(index) {
            if($(this).find('.newData').text()){
                imageName = $(this).text();
                form_data.append('compositefiles[]', imageName);
            }
        });
        $(".toDeleteImagesList span").each(function(index) {
            imageName = $(this).attr('name');
            imageID = $(this).attr('id');
            deleteImagesData.append('deletefilesNames[]', imageName);
            deleteImagesData.append('deletefilesID[]', imageID);
        });
        // for (var pair of form_data.entries()) {
        //         console.log(pair[0]+ ', ' + pair[1]); 
        //    }

        //Ajax to save only updated data
        $.ajax({
            type: 'POST',
            url: base_url+'doctor/updateScan',
            contentType: false,
            processData: false,
            data: form_data,
            success:function(data) {
                var modal = UIkit.modal("#success-model");
                modal.show();
                $("#update").text('Update');
            }
        });

        //Ajax to delete old data
        $.ajax({
            type: 'POST',
            url: base_url+'doctor/deleteOldImages',
            contentType: false,
            processData: false,
            data: deleteImagesData,
            success:function(data) {
                // console.log(data);
            }
        });
    });

