(function() {
    function addRow(stage,id) {
        $.post( window.location.href, {'id':id})
        .done(function(data) {
            if(data.length){
                const div = document.createElement('div');
                div.className = 'form-group';
                div.innerHTML = `
                    <label for="child-`+id+`">Sub category</label>
                    <select class="form-control category select-stage-`+id+`" name="parent" data-stage="`+id+`" reqired>
                    <option value="0">--parent--</option>
                    </select>
                    <div class="stage-`+id+` ">
                    </div>
                `;
                $('.stage-'+stage).append(div);
                $.each(data, function(key, value) {   
                    $('<option>').val(value.id).text(value.name).appendTo('body .select-stage-'+id);
                });
            }
        })
        .fail(function() {
            alert( "error" );
        })
        .always(function() {
            // alert( "finished" );
        });
    }
    $('body').on('change','.category',function(){
        id = $(this).val();
        stage = $(this).data('stage');
        $('.stage-'+stage).html('');
        addRow(stage,id);
    });
  
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();