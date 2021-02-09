<?php get_header(); ?>
<main class="global-main">
  <article class="single-page">
    <div class="container-fluid p-0">
      <div class="eureka-accordion">
        <div class="row no-gutters justify-content-center">
          <div class="col-lg-9">
            <!--
              Available color classes for div.panels-wrap
              – scheme-redish (current)
              – scheme-purple
              – scheme-pink
              – scheme-blue
              – scheme-cyan
            -->
            <div class="panels-wrap scheme-redish">
              <div class="panel-container bg-high">
                <div class="panel">
                  <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                    <div class="icon">
                      <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capabilities.svg');?>
                    </div>
                    <hr>
                    <h6>Capabilities</h6>
                  </div>
                  <ul class="panel-menu">
                    <li>
                      <a href="">
                        Data Integration
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                          <div class="icon">
                            <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                          </div>
                          <hr>
                          <h6>Value by Capability</h6>
                        </div>
                        <ul class="chevron-bullet">
                          <li>Something here</li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="">
                        Real-World Data
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                          <div class="icon">
                            <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                          </div>
                          <hr>
                          <h6>Value by Capability</h6>
                        </div>
                        <ul class="chevron-bullet">
                          <li>Something here</li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <span>Compliance</span>
                      <ul>
                        <li>
                         <a href="">
                            OMOP
                            <div class="icon">
                              <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                            </div>
                          </a>
                          <div class="panel">
                            <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                              <div class="icon">
                                <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                              </div>
                              <hr>
                              <h6>Value by Capability</h6>
                            </div>
                            <ul class="chevron-bullet">
                              <li>Something here</li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <a href="">
                            ATLAS
                            <div class="icon">
                              <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                            </div>
                          </a>
                          <div class="panel">
                            <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                              <div class="icon">
                                <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                              </div>
                              <hr>
                              <h6>Value by Capability</h6>
                            </div>
                            <ul class="chevron-bullet">
                              <li>Something here</li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <a href="">
                            21 CFR Part 11
                            <div class="icon">
                              <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                            </div>
                          </a>
                          <div class="panel">
                            <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                              <div class="icon">
                                <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                              </div>
                              <hr>
                              <h6>Value by Capability</h6>
                            </div>
                            <ul class="chevron-bullet">
                              <li>Something here</li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="panel-container bg-mid">
                <div class="panel">
                  <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                    <div class="icon">
                      <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_personas.svg');?>
                    </div>
                    <hr>
                    <h6>Personas</h6>
                  </div>
                  <ul class="panel-menu">
                    <li>
                      <a href="">Data Engineer
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                          <div class="icon">
                            <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_persona.svg');?>
                          </div>
                          <hr>
                          <h6>Value by Persona</h6>
                        </div>
                        <ul class="chevron-bullet">
                          <li>Remove data silos and connect, clean, and map multiple data sources</li>
                          <li>Centralize all RWD sources to drive insight generation across the enterprise/<li>
                          <li>Analyze combined 1st and 3rd party data sets</li>
                          <li>Develop custom AI models to advance clinical analyses</li>
                          <li>License numerous ConcertAI datasets to accelerate in-house machine learning and statistical models</li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="">Data Scientist
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                          <div class="icon">
                            <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_persona.svg');?>
                          </div>
                          <hr>
                          <h6>Value by Persona</h6>
                        </div>
                        <ul class="chevron-bullet">
                          <li>Analyze combined 1st and 3rd party data sets</li>
                          <li>Develop custom AI models to advance clinical analyses</li>
                          <li>License numerous ConcertAI datasets to accelerate in-house machine learning and statistical models</li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="panel-container bg-low">
                <div class="panel">
                  <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                    <div class="icon">
                      <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_use-cases.svg');?>
                    </div>
                    <hr>
                    <h6>Use Cases</h6>
                  </div>
                  <ul class="panel-menu">
                    <li>
                      <a href="">Non-Technical
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="panel-content">
                          <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                            <div class="icon">
                              <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_use-case.svg');?>
                            </div>
                            <hr>
                            <h6>Value by Use Case</h6>
                          </div>
                          <ul class="chevron-bullet">
                            <li>Analyze combined 1st and 3rd party data sets</li>
                            <li>Develop custom AI models to advance clinical analyses</li>
                            <li>License numerous ConcertAI datasets to accelerate in-house machine learning and statistical models</li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li>
                      <a href="">Technical
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="d-flex align-items-center justify-content-start align-items-md-start flex-md-column">
                          <div class="icon">
                            <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_use-case.svg');?>
                          </div>
                          <hr>
                          <h6>Value by Use Case</h6>
                        </div>
                        <ul class="chevron-bullet">
                          <li>Analyze combined 1st and 3rd party data sets</li>
                          <li>Develop custom AI models to advance clinical analyses</li>
                          <li>License numerous ConcertAI datasets to accelerate in-house machine learning and statistical models</li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <a class="back-button">
                <?php get_template_part('partials/svgs/arrow','svg'); ?>
                <span>Back</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
</main>

<?php get_footer(); ?>