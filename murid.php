<?php
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$gender = $_REQUEST["gender"];
$active = $_REQUEST["active"];

if(!empty($key)){
	$where = " (name LIKE '%$key%' OR email LIKE '%$key%') ";
}

if($act == "del"){
	mysql_query("DELETE FROM students WHERE id_students = '$id'");
}
?>
<?php if($act == "add"){ ?>
<div class="row">
<div class="col-md-12">
	<!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Data Murid</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="forminput" method="post" action="insert-murid.php">
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
                  <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" autocomplete="off" value="<?php echo $name; ?>">
                </div>
				<div class="form-group">
                  <label>Jenis Kelamin</label>
                  <div class="row">
                  	<div class="col-md-2">
                    	<div class="checkbox">
                          <label><input type="radio" name="gender" value="L" <?php if(empty($gender) || $gender == "L"){ echo "checked"; } ?>>&nbsp;&nbsp;Laki - Laki</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                    	<div class="checkbox">
                          <label><input type="radio" name="gender" value="P" <?php if($gender == "P"){ echo "checked"; } ?>>&nbsp;&nbsp;Perempuan</label>
                        </div>
                    </div>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="nama">Email</label>
				  <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" autocomplete="off" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
				  <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Password">
                  
                </div>
				<div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="active" id="active">
                  	<option value="">-- Pilih Status --</option>
                    <option value="1" <?php if(empty($active) || $active == "1"){ echo "selected"; } ?>>Aktif</option>
                    <option value="0" <?php if($active == "0"){ echo "selected"; } ?>>Non Aktif</option>
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
	
	$sql = "SELECT * FROM students WHERE id_students = '$id'"; 
	$has = mysql_query($sql);
	$row = mysql_fetch_array($has);
?>
<div class="row">
<div class="col-md-12">
	<!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Data Murid</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="forminput" method="post" action="update-murid.php">
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
                  <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" autocomplete="off" value="<?php echo $row["name"]; ?>">
                </div>
				<div class="form-group">
                  <label>Jenis Kelamin</label>
                  <div class="row">
                  	<div class="col-md-2">
                    	<div class="checkbox">
                          <label><input type="radio" name="gender" value="L" <?php if($row["gender"] == "L"){ echo "checked"; } ?>>&nbsp;&nbsp;Laki - Laki</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                    	<div class="checkbox">
                          <label><input type="radio" name="gender" value="P" <?php if($row["gender"] == "P"){ echo "checked"; } ?>>&nbsp;&nbsp;Perempuan</label>
                        </div>
                    </div>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="nama">Email</label>
				  <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" autocomplete="off" value="<?php echo $row["email"]; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
				  <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Password">
                  <span><i>*) Kosongkan jika tidak diubah</i></span>
                </div>
				<div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="active" id="active">
                  	<option value="">-- Pilih Status --</option>
                    <option value="1" <?php if(empty($row["active"]) || $active == "1"){ echo "selected"; } ?>>Aktif</option>
                    <option value="0" <?php if($row["active"] == "0"){ echo "selected"; } ?>>Non Aktif</option>
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
              <h3>Murid</h3>
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
                          <input type="text" class="form-control" id="key" name="key" placeholder="Masukkan Nama atau Email" autocomplete="off" value="<?php echo $key; ?>">
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
                        <th>Email</th>
                        <th style=" width: 15%;">Jenis Kelamin</th>
                        <th style=" width: 15%;">Status</th>
                        <th style=" width: 10%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
					$sql = "SELECT * FROM students WHERE $where ORDER BY id_students DESC";
					$has = mysql_query($sql);
					while($row = mysql_fetch_array($has)){
						$no++;
					?>
                      <tr>
                        <td><?php echo $no."."; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo gender($row["gender"]); ?></td>
                        <td><?php echo status($row["active"]); ?></td>
                        <td class=" ">
							<!-- Tomol Edit -->
							<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Edit" class="btn btn-xs tooltips btn-info" onclick=" document.location.href='index.php?pg=<?php echo $pg; ?>&act=edit&id=<?php echo $row["id_students"]; ?>';  ">Edit</button>
							<!-- Tomol Hapus -->
                            <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Hapus" class="btn btn-xs tooltips btn-danger" onclick=" if(confirm('Apakah Yakin Dihapus?')){ document.location.href='index.php?pg=<?php echo $pg; ?>&act=del&id=<?php echo $row["id_students"]; ?>'; } "> Hapus </button>
						</td>
                      </tr> 
                    <?php } ?>  
                   </tbody>
              </table>
            </div>
        </div>
<?php } ?>