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
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div align="center">

                    <!-- Informasi Shift Aktif -->
					<div class="alert alert-info" role="alert">
						<h4 class="alert-heading">Informasi Shift</h4>
						<hr>
						<p><strong>Shift:</strong> <?php echo $shift_info['nama_shift']; ?></p>
						<p><strong>Jam Mulai:</strong> <?php echo $shift_info['jam_mulai']; ?></p>
						<p><strong>Jam Selesai:</strong> <?php echo $shift_info['jam_selesai']; ?></p>
						<p><strong>Hari Ini:</strong> <?php echo $shift_info['hari']; ?></p>
						<p><strong>Waktu Sekarang:</strong> <span id="current-time"></span></p>
						<hr>
						<p class="mb-0"><?php echo $message; ?></p>
					</div>



                    <!-- Check In Section -->
                    <?php if ($check_in_active): ?>
                        <form id="checkin-form" method="post" enctype="multipart/form-data" action="<?php echo site_url('presensi/check_in'); ?>">
                            <!-- Input Kamera (tersembunyi) -->
                            <input type="file" id="camera-in" name="photo" accept="image/*" required capture="environment" style="display:none;" onchange="previewPhoto(event, 'in')" />

                            <!-- Preview Foto Check In -->
                            <div id="photo-preview-in" style="display:none; margin-bottom: 10px;">
                                <img id="preview-img-in" src="" alt="Preview Foto" style="max-width: 100%; height: auto; border: 1px solid #ccc;" />
                            </div>

                            <!-- Tombol Kamera Check In -->
                            <button type="button" class="btn btn-info" onclick="openCamera('camera-in')">
                                <i class="mdi mdi-camera-outline d-block font-size-16"></i> Camera
                            </button>
                            <br><br>

                            <!-- Tombol Check In -->
                            <button type="submit" class="btn btn-primary">
                                <i class="mdi mdi-upload d-block font-size-16"></i> Check In
                            </button>
                        </form>
                    <?php else: ?>
                        <button type="button" class="btn btn-light waves-effect waves-light w-sm" disabled>
                            <i class="mdi mdi-upload d-block font-size-16"></i> Check In
                        </button>
                    <?php endif; ?>

                    <hr>

                    <!-- Check Out Section -->
                    <?php if ($check_out_active): ?>
                        <form id="checkout-form" method="post" enctype="multipart/form-data" action="<?php echo site_url('presensi/check_out'); ?>">
                            <!-- Input Kamera (tersembunyi) -->
                            <input type="file" id="camera-out" name="photo" accept="image/*" required capture="environment" style="display:none;" onchange="previewPhoto(event, 'out')" />

                            <!-- Preview Foto Check Out -->
                            <div id="photo-preview-out" style="display:none; margin-bottom: 10px;">
                                <img id="preview-img-out" src="" alt="Preview Foto" style="max-width: 100%; height: auto; border: 1px solid #ccc;" />
                            </div>

                            <!-- Tombol Kamera Check Out -->
                            <button type="button" class="btn btn-xl btn-info" onclick="openCamera('camera-out')">
                                <i class="mdi mdi-camera-outline d-block font-size-16"></i> Camera
                            </button>
                            <br><br>

                            <!-- Tombol Check Out -->
                            <button type="submit" class="btn btn-primary">
                                <i class="mdi mdi-upload d-block font-size-16"></i> Check Out
                            </button>
                        </form>
                    <?php else: ?>
                        <button type="button" class="btn btn-light waves-effect waves-light w-sm" disabled>
                            <i class="mdi mdi-download d-block font-size-16"></i> Check Out
                        </button>
                    <?php endif; ?>
                </div>

                <!-- JavaScript untuk Kamera dan Preview Foto -->
                <script>
                    function openCamera(cameraId) {
                        document.getElementById(cameraId).click();
                    }

                    function previewPhoto(event, type) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('preview-img-' + type).src = e.target.result;
                                document.getElementById('photo-preview-' + type).style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                </script>

				<script>
					function updateTime() {
						const now = new Date();
						const hours = now.getHours().toString().padStart(2, '0');
						const minutes = now.getMinutes().toString().padStart(2, '0');
						const seconds = now.getSeconds().toString().padStart(2, '0');
						const currentTime = hours + ':' + minutes + ':' + seconds;

						document.getElementById('current-time').textContent = currentTime;
					}

					// Memperbarui waktu setiap 1 detik
					setInterval(updateTime, 1000);

					// Memanggil fungsi pertama kali saat halaman dimuat
					updateTime();
				</script>


            </div>
        </div>
    </div>
</div>
