(function () {


    $(document).ready(function() {
        $('.tags').select2();

        tinymce.init({
            selector: '#body'
        });

    });


    $('.ajaxForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                toastr.success('Actualizado correctamente', 'SUCCESS!');
            },
            error: function (xhr, thrownError) {

                if (xhr.status === 422)
                {
                    var lis = ''
                    $.each(xhr.responseJSON.errors, function(key,value) {

                        lis += '<li> '+ value +' </li>'

                    });

                    $('#display-errors').find('ul').append(lis);
                    $('#display-errors').removeClass('d-none');

                }

                setTimeout(function () {
                    $('#display-errors').find('li').remove();
                    $('#display-errors').addClass('d-none');
                }, 3000)

            }
        });

    });

    /**
     * SLUG
     */

    $('#blog-title').on('change', function () {

        var slug = slugify($(this).val());
        $('#blog-slug').val(slug);

    })


    function slugify(text)
    {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }


    // -------------------------------------------
    //                  TAGS                     |
    // -------------------------------------------

    $('.form-tags').on('submit', function (e) {
        e.preventDefault();

        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var data = $(this).serialize();
        var value =  $(this).find('input[name=name]');

        $.ajax({
            type: method,
            url: action,
            data: data,
            success: function (data) {
                var tag =  data;
                var tr = '';

                tr += '<tr>';
                tr += '<td><span class="badge badge-primary">'+ tag.name +'</span></td>';
                tr += '<td>'+ tag.created_at +'</td>';
                tr += '<td>';
                tr += '<a href="">Edit</a>';
                tr += '</td>';
                tr += '</tr>';

                $('#tags').append(tr);

                $('#tagModal').modal('toggle');
                value.val('');
            },
            error: function (xhr, thrownError) {
                if (xhr.status === 422)
                {
                    var lis = ''
                    $.each(xhr.responseJSON.errors, function(key,value) {

                        lis += '<li> '+ value +' </li>'

                    });

                    $('#display-errors').find('ul').append(lis);
                    $('#display-errors').removeClass('d-none');

                }

                setTimeout(function () {
                    $('#display-errors').find('li').remove();
                    $('#display-errors').addClass('d-none');
                }, 3000)

            }
        });
    });

    // GET TAG

    $('body').on('click', '.get-tag', function (e) {
        e.preventDefault();
        var route = $(this).attr('href');

        $.get(route, function (tag) {

            $('#form-update-tag').attr('action', route);
            $('#update-tag').val(tag.name)

        })
        
    });

    // UPDATE TAG

    $('#form-update-tag').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (tag) {

                $('#tag-' + tag.id).find('.tag-name').text(tag.name);
                $('#update-tag-modal').modal('toggle');

            },
            error: function (xhr, thrownError) {
                if (xhr.status === 422)
                {
                    var lis = ''
                    $.each(xhr.responseJSON.errors, function(key,value) {

                        lis += '<li> '+ value +' </li>'

                    });

                    $('#display-errors').find('ul').append(lis);
                    $('#display-errors').removeClass('d-none');

                }

                setTimeout(function () {
                    $('#display-errors').find('li').remove();
                    $('#display-errors').addClass('d-none');
                }, 3000)
            }
        });

    })

    // DELETE TAG

    $('.delete-model').on('click', function (e) {
        e.preventDefault();

        var delete_form = $('#delete-form');
        delete_form.attr('action', $(this).attr('href'));

        delete_form.submit();

    });

    $('#delete-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (model) {

                $('#model-' + model.id).fadeOut('slow').remove();

            },
            error: function (xhr, thrownError) {
                console.log(xhr, thrownError);
                toastr.success('ups! algo salio mal', 'HQ');
            }
        });

    })

})();
