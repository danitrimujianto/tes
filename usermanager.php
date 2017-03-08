<?php
$nama = $_REQUEST["nama"];
$username = $_REQUEST["username"];
$pwd = $_REQUEST["pwd"];
$status = $_REQUEST["status"];
if(!empty($key)){
	$where = " (nama LIKE '%$key%' OR username LIKE '%$key%') ";
}

if($act == "del"){
	mysql_query("DELETE FROM usermanager WHERE id_usermanager = '$id'");
}
?>
<?php if($act == "add"){ ?>
<div class="row">
<div class="col-md-12">
	<!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Data Usermanager</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="forminput" method="post" action="insert-usermanager.php">
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
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off" value="<?php echo $nama; ?>">
                </div>
                <div class="form-group">
                  <label for="nama">Username</label>
				  <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" autocomplete="off" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
				  <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Password">
                </div>
				<div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status">
                  	<option value="">-- Pilih Status --</option>
                    <option value="1" <?php if(empty($status) || $status == "1"){ echo "selected"; } ?>>Aktif</option>
                    <option value="0" <?php if($status == "0"){ echo "selected"; } ?>>Non Aktif</option>
                  </select>
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
	
	$sql = "SELECT * FROM usermanager WHERE id_usermanager = '$id'"; 
	$has = mysql_query($sql);
	$row = mysql_fetch_array($has);
?>
<div class="row">
<div class="col-md-12">
	<!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Data Usermanager</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="forminput" method="post" action="update-usermanager.php">
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
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off" value="<?php echo $row["nama"]; ?>">
                </div>
                <div class="form-group">
                  <label for="nama">Username</label>
				  <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" autocomplete="off" value="<?php echo $row["username"]; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
				  <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Password"  value="">
                  <span><i>*) Kosongkan jika tidak diubah</i></span>
                </div>
				<div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status">
                  	<option value="">-- Pilih Status --</option>
                    <option value="1" <?php if($row["status"] == "1"){ echo "selected"; } ?>>Aktif</option>
                    <option value="0" <?php if($row["status"] == "0"){ echo "selected"; } ?>>Non Aktif</option>
                  </select>
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
              <h3>Usermanager</h3>
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
                          <input type="text" class="form-control" id="key" name="key" placeholder="Masukkan Nama atau Username" autocomplete="off" value="<?php echo $key; ?>">
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th style=" width: 10%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
					$sql = "SELECT * FROM usermanager WHERE $where ORDER BY id_usermanager DESC";
					$has = mysql_query($sql);
					while($row = mysql_fetch_array($has)){
						$no++;
					?>
                      <tr>
                        <td><?php echo $no."."; ?></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td class=" ">
							<!-- Tomol Edit -->
							<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Edit" class="btn btn-xs tooltips btn-info" onclick=" document.location.href='index.php?pg=<?php echo $pg; ?>&act=edit&id=<?php echo $row["id_usermanager"]; ?>';  ">Edit</button>
							<!-- Tomol Hapus -->
                            <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Hapus" class="btn btn-xs tooltips btn-danger" onclick=" if(confirm('Apakah Yakin Dihapus?')){ document.location.href='index.php?pg=<?php echo $pg; ?>&act=del&id=<?php echo $row["id_usermanager"]; ?>'; } "> Hapus </button>
						</td>
                      </tr> 
                    <?php } ?>  
                   </tbody>
              </table>
            </div>
        </div>
<?php } ?>