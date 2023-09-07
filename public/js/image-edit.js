$(document).ready(function(){
    const validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
    // image preview
    $('[data-id="image"]').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('[data-id="image-item"]').attr('src', e.target.result);
        }
        if (validImageTypes.includes(this.files[0]["type"])) {
            reader.readAsDataURL(this.files[0]);
        }
        else {
            if(!$('#image-error').length) {
                $("#image-item-input").append("<p class='errorLabel' id='image-error'>File non valido</p>");
            }
        }
    })
});
