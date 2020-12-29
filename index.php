<!DOCTYPE html>
<html>
<head>
    <title>Lab 8 - PHP 2</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col">
                <h1 class="jumbotron text-center">Image Gallery</h1>
                <hr>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-light mb-3 float-right" data-toggle="modal" data-target="#uploadModal">Upload</button>
                    </div>
                </div>

                <div class="row mb-3">
                    <?php   
                        /* cuts out of the scanned array of images the top 2 redundancies*/
                        $images = array_diff(scandir('imgs'), array('.', '..'));
                        
                        /* html_template for image*/
						$html_template = '
                            <div class="col-md-4 my-auto">
                                <img src="imgs/<IMAGE_PATH>" class="img-fluid img-thumbnail">
                            </div>
                        ';

                        /*replace the <image path> with the $image(fileName) in the html_templates
                        <div class ... <imv src ="imgs/wefje.jpg" class ...> */
                        foreach($images as $image) {  //$images is the array, $image is ea. index
                            echo str_replace("<IMAGE_PATH>", $image, $html_template);
                        }
                    ?>

                </div>
            </div>
        </div>
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" accept="image/*" id="imageFile"> <!-- leave as image/*, predefined -->
                        <p id="uploadError"></p>  <!-- where the error is displayed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFile()">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>