

<?php
echo<<<HTML
<div class="row popup-gallery">
HTML;
foreach($arrayImagenes as $imagen){

    echo<<<HTML


                <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="sol">
HTML;
echo'<img width="200px" height="200px" class="img-responsive" src="'.
                    $imagen->getUrlPortfolio().'" alt="'.$imagen->getDescripcion().'">';
echo<<<HTML

                    
                    <div class="behind">
                        <div class="head text-center">
                        <ul class="list-inline">
                          <li>
HTML;

  echo'<a class="gallery" href="'.$imagen->getUrlGallery().'" data-toggle="tooltip" data-original-title="Quick View">';
echo<<<HTML
                            
                              <i class="fa fa-eye"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                              <i class="fa fa-heart"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Download">
                              <i class="fa fa-download"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#" data-toggle="tooltip" data-original-title="More information">
                              <i class="fa fa-info"></i>
                            </a>
                          </li>
                        </ul>
                        </div>
                        <div class="row box-content">
                        <ul class="list-inline text-center">
HTML;   


ECHO'                    
                          <li><i class="fa fa-eye"></i>'.$imagen->getNumVisualizaciones().'</li>
                          <li><i class="fa fa-heart"></i>'.$imagen->getNumLikes().'</li>
                          <li><i class="fa fa-download"></i>'.$imagen->getNumDownloads().'</li>
                          
                        </ul>
                        </div>
                    </div>
                </div>
                </div> ';
                
             

             
       
}
echo<<<HTML


              </div>
              <nav class="text-center">
                <ul class="pagination">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#" aria-label="suivant">
                    <span aria-hidden="true">&raquo;</span>
                  </a></li>
                </ul>
              </nav>
HTML;              
?>