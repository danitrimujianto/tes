	<div class="row">
    <div class="col-md-12 bg-primary">
        	<h2 class="" style="text-indent: 30px; ">Sistem Informasi Manajemen Kursus</h2>
    </div>
	</div>	
    <?php if(isset($_SESSION["ses-kursus"])){ ?>
	<nav class="navbar navbar-default">
        <div class="container pull-left">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li <?php if(empty($pg)){ echo 'class="active"'; } ?>><a href="index.php">Home</a></li>
              <li <?php if($pg=="usermanager"){ echo 'class="active"'; } ?>><a href="index.php?pg=usermanager">Usermanager</a></li>
              <li class="dropdown <?php if($pg=="kursus" || $pg=="instruktur" || $pg=="murid"){ echo 'active'; } ?>" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Data <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li <?php if($pg=="kursus"){ echo 'class="active"'; } ?>><a href="?pg=kursus">Kursus</a></li>
                  <li <?php if($pg=="instruktur"){ echo 'class="active"'; } ?>><a href="?pg=instruktur">Instruktur</a></li>
                  <li <?php if($pg=="murid"){ echo 'class="active"'; } ?>><a href="?pg=murid">Murid</a></li>
                </ul>
              </li>
              <li <?php if($pg=="daftar_kursus"){ echo 'class="active"'; } ?>><a href="index.php?pg=daftar_kursus">Pendaftaran Kursus</a></li>
              <li <?php if($pg=="bayar_kursus"){ echo 'class="active"'; } ?>><a href="index.php?pg=bayar_kursus">Pembayaran Kursus</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    <?php } ?>