function uploadFile() {
  
    var form = new FormData();                              //.files[0] -- single file upload
                                                            //'file' is #imageFile, which is 
    form.append('file', document.querySelector('#imageFile').files[0]); // #imageFile is is the image's HTML fileName?
    form.append('upload', true);  //'upload' is user defined, add value 'true' to the key 'upload'

    var upload = new XMLHttpRequest(); //upload
    
                                       // POST adds a new resource to the server
    upload.open('POST', 'upload.php'); // xml..open(requestType, file) --- the file in this case is a return value from upload.php
    
    // Does state change include posted items?
    upload.onreadystatechange = function() {  // inline function to becalled when XMLrequest state changes
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.responseText == 1) { // Success; what is responseText? upload.onreadystatechange.responseText?
                document.querySelector('#uploadError').innerText = "Image uploaded successfully.";
                setTimeout(window.location.reload(), 1500);
            } else {                    // Fail
                document.querySelector('#uploadError').innerText = "An error occoured when uploading the image";
                alert("damn");
            }
        }
    };
    upload.send(form);
}