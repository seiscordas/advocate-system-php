<div class="pg-ajax">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Cod</th>
        <th>Requerido</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr class="dados-reque">
        <td>
		  <?php echo $row->cd_requerido;?>
          <input type="hidden" class="box-cd_requerido" value="<?php echo $row->cd_requerido;?>">
        </td>
        <td>
		  <?php echo $row->nm_requerido;?>
          <input type="hidden" class="box-nm_requerido" value="<?php echo $row->nm_requerido;?>">
        </td>        
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div><!-- pg ajax-->