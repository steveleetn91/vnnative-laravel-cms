$(document).ready(function() {
    /**
     * Review Image 
     */
    setInterval(() => {
        let createImage = document.createElement('img');
        let src = $("#imgField").val();
        if(src != '' && src) {
            createImage.src = src;
            let mappingId = $("#imgReviewBox").val();
            if(createImage.src != '') {
                document.getElementById(mappingId).innerHTML = '';
                document.getElementById(mappingId).append(createImage);    
            }
        }
        
        
    }, 3000);
    /**
     * Tags 
     */
    // $(".form-tags").select2({
    //     tags: true,
    //     tokenSeparators: [',', ' ']
    // })
});