$(window).on( "load", function() {
    $(".item-to-delete").on("click", function(event) {
        let msg= "Sei sicuro di eliminare questo elemento definitivamente?";
        createModal(event.target.id, msg);
    });
});


function createModal(buttonID, msg) {
    let form= document.getElementById(buttonID).form;
    let modal = document.createElement('div');
    modal.id = "confirm-deletion";
    modal.className = "modal flex-centered";
    modal.innerHTML = `
    <div class="modal-content">
        <div class="container">
        <span class="close close-modal" title="Close Modal">×</span>
            <div class="warning-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                     class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
            </div>
            <div class="delete-msg"><p>` + msg + `</p></div>
            <div class="clearfix">
                <button type="button" class="btn-rect btn-light close-modal">Cancel</button>
                <button type="submit" class="btn-rect btn-red">Delete</button>
            </div>
        </div>
    </div>`
    form.appendChild(modal);

    const closingButton = document.querySelectorAll('#confirm-deletion .close-modal');

    closingButton.forEach(btn => {
        btn.addEventListener('click', function () {
            modal.remove();
        });
    });
}
