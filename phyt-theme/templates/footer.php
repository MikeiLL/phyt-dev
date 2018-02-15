<?php
use Roots\Sage\Extras
?>
<footer class="content-info py-2 mt-2">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="card text-center rounded-0">
          <div class="card-body" itemscope itemtype="http://schema.org/MedicalOrganization">
            <h3 class="card-subtitle" itemprop="name">Phyt Rehab</h3>
              <div class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <span itemprop="streetAddress">171 Kings Highway</span><br />
                <span itemprop="addressLocality">Brooklyn</span>,
                <span itemprop="addressRegion">NY</span>
                <span itemprop="postalCode">11223</span><br />
                <span itemprop="email">info@phytrehab.com</span>
              </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="float-right text-right">America's leading physical,<br /> occupational and speech <br/>therapy group. <p>#PhytSquad</p>
          <ul class="footer-social">
          <li><a href="https://www.facebook.com/PhytRehab/" target="_blank"><svg class="icon icon-footer icon-facebook2"><use xlink:href="#icon-facebook2"></use></svg></a></li>
          <li><a href="https://twitter.com/phytrehab" target="_blank"><svg class="icon icon-footer icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a></li>
          <li><a href="https://www.linkedin.com/company/phyt-inc/" target="_blank"><svg class="icon icon-footer icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg></a></li>
        </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container copyright">
    <?php Extras\bns_dynamic_copyright() ?>
  </div>
</footer>
