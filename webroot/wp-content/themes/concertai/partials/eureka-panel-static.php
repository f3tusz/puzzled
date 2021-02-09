<div class="eureka-accordion">
        <div class="row no-gutters justify-content-center">
          <div class="col-lg-12">
            <!--
              Available color classes for div.panels-wrap
              – scheme-redish (current)
              – scheme-purple
              – scheme-pink
              – scheme-blue
              – scheme-cyan
            -->
            <div class="panels-wrap scheme-<?php echo $color_scheme; ?>">
              
              
              
              <div class="panel-container bg-high">
                <div class="panel">
                  <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                    <div class="icon">
                      <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capabilities.svg');?>
                    </div>
                    <hr>
                    <h6>Capabilities</h6>
                  </div>
                  <ul class="panel-menu">
                    <li>
                      <a href="" data-class="panel-opened">
                        Data Integration
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                          <div class="icon">
                            <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                          </div>
                          <hr>
                          <h6>Value by Capability</h6>
                        </div>
                        <ul class="chevron-bullet">
                          <li>Something about dat aintegration</li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="" data-class="panel-opened">
                        Real-World Data
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                          <div class="icon">
                            <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                          </div>
                          <hr>
                          <h6>Value by Capability</h6>
                        </div>
                        <ul class="chevron-bullet">
                          <li>Something real-world data</li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <span>Compliance</span>
                      <ul>
                        <li>
                          <a href="" data-class="panel-opened">
                            OMOP
                            <div class="icon">
                              <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                            </div>
                          </a>
                          <div class="panel">
                            <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                              <div class="icon">
                                <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                              </div>
                              <hr>
                              <h6>Value by Capability</h6>
                            </div>
                            <ul class="chevron-bullet">
                              <li>Something here about OMOP</li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <a href="" data-class="panel-opened">
                            ATLAS
                            <div class="icon">
                              <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                            </div>
                          </a>
                          <div class="panel">
                            <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                              <div class="icon">
                                <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                              </div>
                              <hr>
                              <h6>Value by Capability</h6>
                            </div>
                            <ul class="chevron-bullet">
                              <li>Something here about Atlas</li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <a href="" data-class="panel-opened">
                            21 CFR Part 11
                            <div class="icon">
                              <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                            </div>
                          </a>
                          <div class="panel">
                            <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                              <div class="icon">
                                <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_capability.svg');?>
                              </div>
                              <hr>
                              <h6>Value by Capability</h6>
                            </div>
                            <ul class="chevron-bullet">
                              <li>Something here about 21 CFR Part 11</li>
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
                  <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                    <div class="icon">
                      <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_personas.svg');?>
                    </div>
                    <hr>
                    <h6>Personas</h6>
                  </div>
                  <ul class="panel-menu">
                    <li>
                      <a href="" data-panel-class="panel-opened">Clinical Development
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="d-flex">
                          <hr>
                        </div>
                        <ul class="panel-menu">
                          <li>
                            <a href="" data-panel-class="panel-expanded">Clinical R&D Leaders
                              <div class="icon">
                                <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                              </div>
                            </a>
                            <div class="panel">
                              <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
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
                          <li>
                            <a href="" data-panel-class="panel-opened">Biostatisticians
                              <div class="icon">
                                <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                              </div>
                            </a>
                            <div class="panel">
                              <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                                <div class="icon">
                                  <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_persona.svg');?>
                                </div>
                                <hr>
                                <h6>Value by Persona</h6>
                              </div>
                              <ul class="chevron-bullet">
                                <li>License numerous ConcertAI datasets to accelerate in-house machine learning and statistical models</li>
                                <li>Develop custom AI models to advance clinical analyses</li>
                                <li>Analyze combined 1st and 3rd party data sets</li>
                              </ul>
                            </div>
                          </li>
                          <li><span>Medical Affairs Leaders</span></li>
                          <li><span>Brand Leaders</span></li>
                          <li><span>Commercial Operations</span></li>
                          <li><span>Field and Sales Operations</span></li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="" data-panel-class="panel-opened">Commercial
                        <div class="icon">
                          <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                        </div>
                      </a>
                      <div class="panel">
                        <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
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
                  <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
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
                          <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                            <div class="icon">
                              <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_use-case.svg');?>
                            </div>
                            <hr>
                            <h6>Value by Use Case</h6>
                          </div>
                          <ul class="chevron-bullet">
                            <li>Develop custom AI models to advance clinical analyses</li>
                            <li>License numerous ConcertAI datasets to accelerate in-house machine learning and statistical models</li>
                            <li>Analyze combined 1st and 3rd party data sets</li>
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
                        <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
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