<div class="container">
  <div class="row">
    <div class="col s12 m12" style="padding-top: 5%;">
      <div class="card">
        <?php for($i=0;$i<12;$i++){?>
        <div class="col s12 m6">
          <div class="card">
            <div class="card-image">
              <img src="<?php echo base_url(); ?>assets/img/vaksin/vaksin1.jpg" style="width: 100%;">
              <a class="btn-floating btn-large halfway-fab waves-effect waves-light" href="<?php echo base_url(); ?>detail/?id=<?php echo $i; ?>">
                <i class="material-icons">info_outline</i>
              </a>
            </div>
            <div class="card-content">
              <span class="card-title" style="font-weight: bolder;">AstraZeneca</span>
              <p>
                adalah sebuah perusahaan farmasi yang merupakan hasil merger dari perusahaan Swedia Astra AB dan perusahaan Britania Zeneca Group PLC. 
                AstraZeneca mengembangkan, memproduksi, dan menjual farmasi untuk perawatan pada masalah gastrointestinal, kardiologi dan vascular, neurological dan psikiatri, infeksi, pernapasan, radang. dan onkologi.
              </p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>