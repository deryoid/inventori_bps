<?php include_once 'header.php';?>
<style>
    h2{
	font-family: sans-serif;
	font-weight: normal;
}
 
.malasngoding-slider { 
	border: 10px solid #efefef; 
	position: relative; 
	overflow: hidden; 
	background: #efefef;
}
 
.malasngoding-slider { 
	margin:20px auto;
	width: 768px;
	height: 450px; 
}
 
.isi-slider img { 
	width: 768px;
	height: 450px; 
	float: left;
}
 
.isi-slider { 
	position: absolute; 
	width:3900px;  
 
	/*pengaturan durasi lama tampil gambar bisa di atur di bawah ini*/
	animation-name:slider;
	animation-duration:16s;
	animation-timing-function: ease-in-out;
	animation-iteration-count:infinite;
	-webkit-animation-name:slider;
	-webkit-animation-duration:16s;
	-webkit-animation-timing-function: ease-in-out;
	-webkit-animation-iteration-count:infinite;
	-moz-animation-name:slider;
	-moz-animation-duration:16s;
	-moz-animation-timing-function: ease-in-out;
	-moz-animation-iteration-count:infinite;
	-o-animation-name:slider;
	-o-animation-duration:16s;
	-o-animation-timing-function: ease-in-out;
	-o-animation-iteration-count:infinite;
}
 
 
/*saat gambar di hover oleh cursor mouse maka berhenti slide*/
.isi-slider:hover { 
	-webkit-animation-play-state:paused; 
	-moz-animation-play-state:paused; 
	-o-animation-play-state:paused; 
	animation-play-state:paused; }
}
 
.isi-slider img { 
	float: right; 
}
 
.malasngoding-slider:after { 
	font-size: 150px; 
	position: absolute; 
	z-index: 12; 
	color: rgba(255,255,255, 0); 
	left: 300px; top: 80px; 
	-webkit-transition: 1s all ease-in-out; 
	-moz-transition: 1s all ease-in-out; 
	transition: 1s all ease-in-out; 
}
 
.malasngoding-slider:hover:after { 
	color: rgba(255,255,255, 0.6);  
}
 
 
 
@-moz-keyframes slider {     
	0% {
		left: 0; opacity: 0; 
	}     
	2% {
		opacity: 1; 
	}     
	20% {
		left: 0; opacity: 1; 
	}     
	21% {
		opacity: 0; 
	}     
	24% {
		opacity: 0; 
	}     
	25% {
		left: -768px; opacity: 1; 
	}       
	45% {
		left: -768px; opacity: 1; 
	}     
	46% {
		opacity: 0; 
	}     
	48% {
		opacity: 0; 
	}     
	50% {
		left: -1536px; opacity: 1; 
	}     
	70% {
		left: -1536px; opacity: 1; 
	}     
	72% {
		opacity: 0; 
	}     
	74% {
		opacity: 0; 
	}    
	75% {
		left: -2304px; opacity: 1; 
	}   	
	95% {
		left: -2304px; opacity: 1; 
	}   	
	97% { 
		left: -2304px; opacity: 0;
	}   	
	100% {
		left: 0; opacity: 0; 
	}
} 
 
@-webkit-keyframes slider {     
	0% {
		left: 0; opacity: 0; 
	}     
	2% {
		opacity: 1; 
	}     
	20% {
		left: 0; opacity: 1; 
	}     
	21% {
		opacity: 0; 
	}     
	24% {
		opacity: 0; 
	}     
	25% {
		left: -768px; opacity: 1; 
	}       
	45% {
		left: -768px; opacity: 1; 
	}     
	46% {
		opacity: 0; 
	}     
	48% {
		opacity: 0; 
	}     
	50% {
		left: -1536px; opacity: 1; 
	}     
	70% {
		left: -1536px; opacity: 1; 
	}     
	72% {
		opacity: 0; 
	}     
	74% {
		opacity: 0; 
	}    
	75% {
		left: -2304px; opacity: 1; 
	}   	
	95% {
		left: -2304px; opacity: 1; 
	}   	
	97% { 
		left: -2304px; opacity: 0;
	}   	
	100% {
		left: 0; opacity: 0; 
	}
} 
 
 
@keyframes slider {     
	0% {
		left: 0; opacity: 0; 
	}     
	2% {
		opacity: 1; 
	}     
	20% {
		left: 0; opacity: 1; 
	}     
	21% {
		opacity: 0; 
	}     
	24% {
		opacity: 0; 
	}     
	25% {
		left: -768px; opacity: 1; 
	}     
	45% {
		left: -768px; opacity: 1; 
	}     
	46% {
		opacity: 0; 
	}     
	48% {
		opacity: 0; 
	}     
	50% {
		left: -1536px; opacity: 1; 
	}     
	70% {
		left: -1536px; opacity: 1; 
	}     
	72% {
		opacity: 0; 
	}     
	74% {
		opacity: 0; 
	}    
	75% {
		left: -2304px; opacity: 1; 
	}   	
	95% {
		left: -2304px; opacity: 1; 
	}   	
	97% { 
		left: -2304px; opacity: 0; 
	} 
 
	100% {
		left: 0; opacity: 0; 
	}
}
</style>
<!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="row page-titles">
                        <div class="col-md-5 col-8 align-self-center">
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <h3 class="card-title"><b>Aplikasi Inventori Barang </b></h3>
                                <p class="card-title"><b>Badan Pusat Statistik Marabahan</b></p>
                                <div class=malasngoding-slider>
                                    <div class=isi-slider>
                                        <img src="assets/images/bg.jpeg" alt="Gambar 1">
                                        <img src="assets/images/bg2.jpeg" alt="Gambar 2">
                                        <img src="assets/images/bg3.jpeg" alt="Gambar 3">
                                    </div>
                                </div>
                                <h5>Visi BPS</h5>
                                <p style="text-align:justify;">
                                Berperan dalam penyediaan data statistik nasional maupun internasional, untuk menghasilkan statistik yang mempunyai kebenaran akurat dan menggambarkan keadaan yang sebenarnya, dalam rangka mendukung Indonesia Maju.Dengan visi baru ini, eksistensi BPS sebagai penyedia data dan informasi statistik menjadi semakin penting, karena memegang peran dan pengaruh sentral dalam penyediaan statistik berkualitas tidak hanya di Indonesia, melainkan juga di tingkat dunia. Dengan visi tersebut juga, semakin menguatkan peran BPS sebagai pembina data statistik.
                                </p>
                                <br>
                                <h5>Misi BPS </h5>
                                <p style="text-align:justify;">Dirumuskan dengan memperhatikan fungsi dan kewenangan BPS, visi BPS serta melaksanakan Misi Presiden dan Wakil Presiden yang Ke-1 (Peningkatan Kualitas Manusia Indonesia), Ke-2 (Struktur Ekonomi yang Produktif, Mandiri, dan Berdaya Saing) dan yang Ke-3 Pembangunan yang Merata dan Berkeadilan, dengan uraian sebagai berikut:</p>
                                <p style="text-align:left;">
                                1. Menyediakan statistik berkualitas yang berstandar nasional dan internasional.<br>
                                2. Membina K/L/D/I melalui Sistem Statistik Nasional yang berkesinambungan.<br>
                                3. Mewujudkan pelayanan prima di bidang statistik untuk terwujudnya Sistem Statistik Nasional.<br>
                                4. Membangun SDM yang unggul dan adaptif berlandaskan nilai profesionalisme, integritas dan  amanah.<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>
<?php include_once 'footer.php';?>