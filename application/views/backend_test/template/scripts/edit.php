    <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="estado"]').on('click', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: '<?php echo base_url('ajax/ajaxCidade/')?>'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="cidade"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="cidade"]').append('<option value="'+ value.idcidade +'">'+ value.nome_cidade +'</option>');
                            });
                            $('select[name="cidade"]').prop('disabled', false);
                            $('select[name="cidade"]').val(<?php echo $usuario->cidade_id?>).trigger("change");
                        }
                    });
                }else{
                    $('select[name="cidade"]').empty();
                }
            });
        });
    </script>
