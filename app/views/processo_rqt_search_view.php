<div class="pg-ajax">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Cod</th>
        <th>Requerente</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr class="dados-reque">
        <td>
		  <?php echo $row->cd_requerente;?>
          <input type="hidden" class="box-cd_requerente" value="<?php echo $row->cd_requerente;?>">
        </td>
        <td>
		  <?php echo $row->nm_requerente;?>
          <input type="hidden" class="box-nm_requerente" value="<?php echo $row->nm_requerente;?>">
        </td>        
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div><!-- pg ajax-->