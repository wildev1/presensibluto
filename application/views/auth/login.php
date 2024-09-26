<!doctype html>
<html lang="en">
<?php foreach ($lembaga as $result): ?>
<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="E-Raport" name="Aqid Fahri Hafin">
    <link rel="shortcut icon" href="<?php echo base_url('upload/logo/'.$result->logo); ?>">
    <link href="<?php echo base_url('public/assets/');?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/assets/');?>css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/assets/');?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Presensi Online Puskesmas Bluto</h5>
                                        <p>Silahkan login untuk melakukan Absensi.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?php echo base_url('public/assets/');?>/upload/logo/logo.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="<?php echo base_url('/');?>">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo base_url('upload/logo/'.$result->logo); ?>" alt="" class="rounded-circle"
                                                height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
								  <?php if ($this->session->flashdata('alert')): ?>
									<div id="alert">
										<?php echo $this->session->flashdata('alert'); ?>
									</div>
									<script>
										setTimeout(function() {
											document.getElementById("alert").remove();
										}, <?php echo $this->session->flashdata('alert_timeout'); ?>);
									</script>
								<?php endif; ?>
								<?php	$alert = $this->input->get('alert');	if ($alert === 'logout') {	echo '<div class="alert alert-info">Anda telah berhasil logout.</div>';	}?>

                                <form class="form-horizontal" action="<?php echo base_url('auth/login');?>"  method="post">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"  placeholder="Enter username" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required="">
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                    <div class="mt-4 text-center">
									<p> <br>©
										<script>
											document.write(new Date().getFullYear())
										</script> Puskesmas Bluto <p>
                                        Devlop by
										<i class="mdi mdi-heart text-danger"></i> PT. Wilcorp Putra Jaya
									</p>
                       			  </div> 
								</div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('public/assets/');?>libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/node-waves/waves.min.js"></script>

    <script src="<?php echo base_url('public/assets/');?>js/app.js"></script>
</body>
<?php endforeach; ?>
</html>
