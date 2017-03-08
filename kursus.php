<?php
$name = $_REQUEST["name"];
$description = $_REQUEST["description"];

if(!empty($key)){
	$where = " (name LIKE '%$key%') ";
}

if($act == "del"){
	mysql_query("DELETE FROM course WHERE id_course = '$id'");
}
?>
<?php if($act == "add"){ ?>
<div class="row">
<div class="col-md-12">
	<!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Data Kursus</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="forminput" method="post" action="insert-kursus.php">
			<input type="hidden" name="pg" value="<?php echo $pg; ?>">
              <div class="box-body">
              	<?php if(isset($_SESSION["error_code"])){ ?>
              	<div class="row">
                	<div class="col-md-12">
                		<span style=" color: #F00; ">Error: <?php echo $_SESSION["error_code"]; unset($_SESSION["error_code"]); ?></span>
                	</div>
                </div>
                <?php } ?>
                <div class="form-group">
                  <label for="nama">Nama Kursus</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Kursus" autocomplete="off" value="<?php echo $nama; ?>">
                </div>
                <div class="form-group">
                  <label for="nama">Deskripsi</label>
				  <textarea class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi"><?php echo $description; ?></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" id="btnCancel" class="btn btn-default  pull-right">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>
</div>
<?php 
}elseif($act == "edit"){
	
	$sql = "SELECT * FROM course WHERE id_course = '$id'"; 
	$has = mysql_query($sql);
	$row = mysql_fetch_array($has);
?>
<div class="row">
<div class="col-md-12">
	<!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Data Kursus</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="forminput" method="post" action="update-kursus.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="pg" value="<?php echo $pg; ?>">
              <div class="box-body">
              	<?php if(isset($_SESSION["error_code"])){ ?>
              	<div class="row">
                	<div class="col-md-12">
                		<span style=" color: #F00; ">Error: <?php echo $_SESSION["error_code"]; unset($_SESSION["error_code"]); ?></span>
                	</div>
                </div>
                <?php } ?>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Kursus" autocomplete="off" value="<?php echo $row["name"]; ?>">
                </div>
                <div class="form-group">
                  <label for="nama">Deskripsi</label>
				  <textarea class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi"><?php echo $row["description"]; ?></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" id="btnCancel" class="btn btn-default  pull-right">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>
</div>
<?php }else{ ?>
<div class="row">
			<div class="col-md-12">
              <h3>Kursus</h3>
            </div>
        	<div class="col-md-12">
            <div class="row">
            	<div class="col-md-6">
                	<button class="btn btn-primary" onClick=" document.location.href='index.php?pg=<?php echo $pg; ?>&act=add'; ">Tambah</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-default" id="refresh">Refresh</button>
                </div>
                <div class=" col-md-4 pull-right"> 
                <form method="post" action="index.php?pg=<?php echo $pg; ?>" role="form">
                    <div class="form-group">
                    	<div class="row">
                        <div class="col-md-10">
                          <input type="text" class="form-control" id="key" name="key" placeholder="Masukkan Nama Kursus" autocomplete="off" value="<?php echo $key; ?>">
                        </div>
                        <div class="col-md-2">
                          <button class="btn btn-info" type="submit">Cari</button>
                        </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        	<div class=" col-md-12">
            	<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style=" width: 5%;">No.</th>
                        <th style=" width: 20%;">Nama Kursus</th>
                        <th>Deskripsi</th>
                        <th style=" width: 10%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
					$sql = "SELECT * FROM course WHERE $where ORDER BY id_course DESC";
					$has = mysql_query($sql);
					while($row = mysql_fetch_array($has)){
						$no++;
					?>
                      <tr>
                        <td><?php echo $no."."; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo str_replace("\n", "<br>", $row["description"]); ?></td>
                        <td class=" ">
							<!-- Tomol Edit -->
							<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Edit" class="btn btn-xs tooltips btn-info" onclick=" document.location.href='index.php?pg=<?php echo $pg; ?>&act=edit&id=<?php echo $row["id_course"]; ?>';  ">Edit</button>
							<!-- Tomol Hapus -->
                            <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Hapus" class="btn btn-xs tooltips btn-danger" onclick=" if(confirm('Apakah Yakin Dihapus?')){ document.location.href='index.php?pg=<?php echo $pg; ?>&act=del&id=<?php echo $row["id_course"]; ?>'; } "> Hapus </button>
						</td>
                      </tr> 
                    <?php } ?>  
                   </tbody>
              </table>
            </div>
        </div>
<?php } ?>