<?php $this->load->view('header');?>
<?php
    //carrega a traducao em portugues para as tabelas
    $ci =& get_instance();
    $ci->load->model('Util_model');
    $datatablesPortugueseBrasil = $ci->Util_model->datatablesPortugueseBrasil();
?>


  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/plugins/timepicker/bootstrap-timepicker.min.css');?>">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
 
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 
        <?= $monitoria->nomeDisciplina  ?>      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li class="active">Monitoria </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-md-4">

                <div class="box box-header">
                    <div class="box-header">
                        <h3 class="box-title">Informações</h3>
                    </div>
                    <div class="box-body"> 
                        <p> <b>Curso:</b> <?= $monitoria->curso ?>  </p>
                        <p> <b>Professor:</b> <?= $monitoria->professor ?>  </p>
                        <p> <b>Monitor:</b> <?= $monitoria->monitor ?>  </p>
                        <p> <b>Semestre:</b> <?= $monitoria->periodo ?>  </p>
                    </div> 
                </div>
                <!-- /.box --> 
            </div>
        
            <!-- /.col (left) -->
            <div class="col-md-8">
                <div class="box box-header">
                    <div class="box-header">
                        <h3 class="box-title">Horários</h3>
                    </div>
                    <div class="box-body"> 
                        <input type="hidden" id="quantHorarios" value="1"> 
                        <table class="table table-bordered" id="tableHour"> 
                            <tr> 
                                <td> 
                                  <select class="form-control" id="dia_1" >
                                    <option>Segunda-feira</option>
                                    <option>Terça-feira</option>
                                    <option>Quarta-feira</option>
                                    <option>Quinta-feira</option>
                                    <option>Sexta-feira</option>
                                  </select>   
                                </td> 
                                <td><div class="bootstrap-timepicker"> <input id="inicio_1" type="text" class="form-control timepicker" value="15:00"> </div> </td> 
                                <td><div class="bootstrap-timepicker"> <input id="fim_1" type="text" class="form-control timepicker" value="16:00"> </div> </td> 
                                <td style="vertical-align: middle;"><a href="#"><span class="glyphicon glyphicon-trash" ></span></a></td> 
                            </tr>  
                        </table>
                        <br/>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-default" name="opcao" value="adicionar" onclick="addHour()">Adicionar</button>
                        </div>  
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-default" name="opcao" value="salvar">Salvar</button>
                        </div> 
                    </div> 
                </div>
                    <!-- /.box -->
      
            </div>
            <!-- /.col (right) -->
        
        </div>
        <!-- /.row --> 
       
       
        <div class="row">
            <div class="col-xs-12"> 
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Frequência</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Data</th>
                          <th>Quant. Alunos</th>
                          <th> </th>  
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach ($frequencias as $frequencia) { ?>
                        <tr>
                          <td><?= $frequencia->data . ' - ' . $frequencia->horario ?></td> 
                          <td><?= $frequencia->quant ?></td> 
                          <td>Editar</td>  
                        </tr> 
                        <?php }?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Data</th>
                          <th>Quant. Alunos</th>
                          <th> </th>  
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                
                    <div class="box-body"> 
                        <div class="row"> 
                          
                            <div class="box-body"> 
                                <form role="form" action="" method="post"> 
                                    <div class="box-body"> 
                                        <input type="hidden" name="id_monitoria" value="">
                                  
                                        <div class="form-group">
                                            <label>Adicionar frequências</label>
                                        </div> 
                                        <div class="form-group">
                                            <div class="col-xs-2">  
                                                <input type="number" class="form-control" name="email" placeholder="Quant. de alunos" value="">
                                            </div>
                                            <div class="col-xs-2">                        
                                                <button type="submit" class="btn btn-default" name="opcao" value="proximo">Proximo</button>
                                            </div>
                                        </div> 
                                    </div>   
                                </form> 
                            </div> 
                        </div> 
                    </div>
                    
                </div>
              <!-- /.box -->
              
            </div>
            <!-- /.col -->
                    
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

<?php $this->load->view('footer'); ?>
 
 
<!-- DataTables -->
<script src="<?php echo base_url();?>/AdminLTE-2.4.3/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/AdminLTE-2.4.3/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        
 
<!-- bootstrap time picker -->
<script src="<?= base_url('/AdminLTE-2.4.3/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>
 
 
<!-- page script -->
<script> 
    function addHour() {
        var quantHorarios = document.getElementById("quantHorarios");
                 
        var cell1 = '';
        var cell2 = '';
        var cell3 = '';
        var cell4 = '';
            
        cell1 += '<select class="form-control" id="dia_1" >';
        cell1 += '   <option>Segunda-feira</option>';
        cell1 += '   <option>Terça-feira</option>';
        cell1 += '   <option>Quarta-feira</option>';
        cell1 += '   <option>Quinta-feira</option>';
        cell1 += '   <option>Sexta-feira</option>';
        cell1 += '</select>';
        
        cell2 += '<div class="bootstrap-timepicker"> <input id="inicio_1" type="text" class="form-control timepicker" value="2:00 PM"> </div>';
        cell3 += '<div class="bootstrap-timepicker"> <input id="fim_1" type="text" class="form-control timepicker" value="2:00 PM"> </div>';
        cell4 += '<a href="#"><span class="glyphicon glyphicon-trash" ></span></a>'; 
 
 
        var table = document.getElementById("tableHour");
        var row = table.insertRow(0);
        var cell1_ = row.insertCell(0);
        var cell2_ = row.insertCell(1);
        var cell3_ = row.insertCell(2);
        var cell4_ = row.insertCell(3);
        cell1_.innerHTML = cell1;
        cell2_.innerHTML = cell2;
        cell3_.innerHTML = cell3;
        cell4_.innerHTML = cell4; 
        
        quantHorarios.value = 1.0 + parseInt(quantHorarios.value); 
   
        loadTimepicker(); 
    }
</script>
<script>
  $(function () {

    $('#example1').DataTable({  
        'language': <?= $datatablesPortugueseBrasil?>
    }) 
    
    loadTimepicker();
  })
  
  
    function loadTimepicker() { 
        //Timepicker
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            showInputs: false,
            defaultTime: 'value'
        }) 
    }
</script>
 
