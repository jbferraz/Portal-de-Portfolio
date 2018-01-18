
<div class="footer-clean" style="padding-left: 300px;">
    <footer>
        <div style="display: table; width: 100%;">
        <div class="container ">
            <div class="row">
                 <div class="col-md-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                     <h4> Portal de Portfólio © 2018</h4>
                </div>
                <div class="col-md-3 col-sm-4 item">
                    <h3>Sobre</h3>
                    
                        <li><a href="<?php echo base_url('home/sobre') ?>">Sobre o site / Desenvolvedores </a></li>
                        <li><a href="<?php echo base_url('login') ?>">Login</a></li>
                        <li><a href="<?php echo base_url('cadastro') ?>">Cadastro</a></li>
                    
                </div>
                
               
               
            </div>
        </div>
    </footer>
</div>

<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script type="text/javascript">
    $("#btn-lista").click(function () {
        $("#div-lista").toggleClass("hide");
    });
</script>

</body>

</html>
