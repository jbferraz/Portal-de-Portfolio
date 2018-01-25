<?php if ($this->session->flashdata('success_msg')) {
        ?>
        <div class="alert_true" style="
            width: 50%; padding: 25px; margin: 30px auto 0; 
            color: #006600; text-align: center; background: #b3ffb3;">
            <?php echo $this->session->flashdata('success_msg') ?>
        </div>
        <?php
    }
    if ($this->session->flashdata('error_msg')) {
        ?>
        <div class="alert_false" style="
            width: 50%; padding: 25px; margin: 30px auto 0; 
            color: #800000; text-align: center; background: #ff9999;">
            <?php echo $this->session->flashdata('error_msg') ?>
        </div>
        <?php
    }
    ?>

    <form action="<?php echo base_url('home/submit') ?>"
        method="post">
        <div class="login" style="
            display: table; width: 30%; height: 200px;
            margin: 150px auto 0;">
                <div style="float: left; width: 70%;">               
                    <label>EMAIL</label><br>
                    <input style="
                        width: 95%; height: 30px;"  
                        type="email" name="email" required><br><br>
                    <label>SENHA</label><br>
                    <input style="
                        width: 95%; height: 30px;"  
                        type="password" name="senha" required><br><br> 
                </div>
                <div style="float: right; width: 30%;">
                    <input type="submit"  value="LOGIN" style="
                        display: table; margin: 18px auto 0; 
                        width: 90%; height: 40px; font-size: 15px;"/>
                </div>
        </div>
    </form>
