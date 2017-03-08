<?php
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$gender = $_REQUEST["gender"];
$active = $_REQUEST["active"];

if(!empty($key)){
	$where = " (b.name LIKE '%$key%') ";
}

if($act == "del"){
	mysql_query("DELETE FROM tr_docourse WHERE id_trdocourse = '$id'");
}
?>
<div class="row">
			<div class="col-md-12">
              <h3>Pendaftaran Kursus</h3>
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
                          <input type="text" class="form-control" id="key" name="key" placeholder="Masukkan Nama " autocomplete="off" value="<?php echo $key; ?>">
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
                        <th>Kursus</th>
                        <th>Instruktur</th>
                        <th>Tanggal</th>
                        <th style=" width: 10%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
					$sql = "SELECT a.id_trdocourse, a.date, b.name AS nama_murid, c.name AS nama_kursus, d.name AS nama_instruktur 
							FROM tr_docourse a
							INNER JOIN students b ON a.id_students=b.id_students
							INNER JOIN course c ON a.id_course=c.id_course
							INNER JOIN instructors d ON a.id_instructor=d.id_instructor
							WHERE $where ORDER BY id_trdocourse DESC";
					$has = mysql_query($sql);
					while($row = mysql_fetch_array($has)){
						$no++;
					?>
                      <tr>
                        <td><?php echo $no."."; ?></td>
                        <td><?php echo $row["nama_murid"]; ?></td>
                        <td><?php echo $row["nama_kursus"]; ?></td>
                        <td><?php echo $row["nama_instruktur"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
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