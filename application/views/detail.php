<div class="container">
    <div class="row" style="min-height:700px">
        <div class="col s12 m6" style="padding-top: 5%;">
            <div class="card" style="max-height:700px">
                <div class="card-image row">
                    <!-- <div class="col m4"></div> -->
                    <div class="col s12 m12">
                        <img src="<?php echo base_url(); ?>assets/img/vaksin/vaksin1.jpg" style="width: 100%;">
                    </div>
                    <span class="card-title hide-on-med-and-down" style="background:var(--primary);font-weight: bolder;">AstraZeneca</span>
                </div>
                <div class="card-content" style="min-height: 300px;">
                    <span class="card-title hide-on-large-only" style="font-weight: bolder;">AstraZeneca</span>
                </div>
            </div>
        </div>
        <div class="card col s12 m6" style="margin-top: 5.5%;">
            <button class="waves-effect waves-light btn-large" style="background:var(--secondary);">Form Pre-Order Vaksin</button>
            <form class="card-content" style="background:transparent">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="John Doe" id="nama" type="text" class="validate">
                        <label for="nama">Nama Lengkap</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="johndoe123@gmail.com" id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Surabaya" id="kota" type="text" class="validate">
                        <label for="kota">Kota Domisili</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="08123456789" id="telp" type="text" class="validate">
                        <label for="telp">No Telepon Aktif</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="12345678910" id="nik" type="text" class="validate">
                        <label for="telp">NIK/No KK</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>