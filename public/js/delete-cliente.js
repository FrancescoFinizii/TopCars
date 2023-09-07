function createClientListToDelete() {
    let form = document.getElementById("form-delete-client");
    let listDiv = document.createElement("div");
    listDiv.id = "client-list-to-delete";
    listDiv.innerHTML = `
        <div class="client-selected-heading">
            <h2>Clienti selezionati</h2>
        </div>
        <div id="client-selected-cont">
        </div>
        <div class="client-selected-deleted flex-between">
            <span id="number-items"></span>
            <div>
                <button id="close-window" class="btn-rect btn-" type="button">Annulla</button>
                <button id="delete-selected" class="btn-rect btn-red" type="submit">Conferma eliminazione</button>
            </div>
        </div>`;
    form.appendChild(listDiv);

    // Call Controller's function
    $('#delete-selected').on('click', function(e) {
        let allElem = []
        $(".client-item").each(function() {
            allElem.push($(this).data('id'));
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: $("#form-delete-client").data("url"),
            data: {ids: allElem},
            success: function(response) {
                window.location = response.url;
                alert("Clienti eliminati con successo!")
            },
            error:function(data){
                alert(data.responseText);
            }
        })
    });

    document.getElementById("close-window").addEventListener("click", function() {
        listDiv.remove();
        enableAllButton();
    })

}


function addToList(id, username) {
    if (document.getElementById("client-list-to-delete") == null) {
        createClientListToDelete();
    }
    let clientList= document.getElementById("client-selected-cont");
    let clientItem = document.createElement("div");
    clientItem.className = "client-item";
    clientItem.id = username;
    clientItem.setAttribute("data-id", id);
    clientItem.innerHTML = `
        <p>` + username + `</p>
        <button class="btn-rect btn-black" type="button">x</button>`;
    clientList.appendChild(clientItem);
    clientItem.getElementsByTagName("button")[0].addEventListener("click", function() {
        removeToList(id, username);
    })
    document.getElementById(id).disabled = true;
    document.getElementById("number-items").innerText = document.getElementsByClassName("client-item").length + " Elementi";
}


function removeToList(buttonID, clientItem) {
    if (document.getElementById(buttonID) != null) {
        document.getElementById(buttonID).disabled = false;
    }
    document.getElementById(clientItem).remove();
    if (document.getElementsByClassName("client-item").length === 0) {
        document.getElementById("client-list-to-delete").remove();
    }
    else {
        document.getElementById("number-items").innerText = document.getElementsByClassName("client-item").length + " Elementi"
    }
}

const changePage = page => {
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: $("#table_data").data("route"),
        method:"get",
        data:{_token:_token, page:page},
        success:function(data){
            $('#table_data').html(data);
            RunButtonFunction();
            disabledButton();
        },
        error:function(data){
            alert(data.responseText);
        }
    });

}


function RunButtonFunction() {
    $(".client-to-delete").on("click", function(event) {

        if (event.target.id !== undefined && event.target.dataset.username !== undefined) {
            let clientToDelete = $('.client-item').map(function(){return $(this).data("id");}).get();
            if ($.inArray(parseInt(event.target.id), clientToDelete) === -1 || clientToDelete.length === 0) {
                addToList(event.target.id, event.target.dataset.username);
            }
        }
    });
}

function disabledButton() {
    let clientToDelete = $('.client-item').map(function(){return $(this).data("id");}).get();
    $(".client-to-delete").each(function() {
        if ($.inArray(parseInt($(this).attr("id")), clientToDelete) !== -1) {
            $(this).prop("disabled", true);
        }
    });
}


function enableAllButton() {
    $(".client-to-delete").each(function() {
        $(this).prop("disabled", false);
    });
}


$(window).on( "load", function() {

    $('body').on('click', ".pager a", function(event){
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        changePage(page);
    });

    RunButtonFunction();

    $("#delete-all").click( function() {
        let msg= "Sei sicuro di voler eliminare tutti i clienti definitivamente?";
        createModal("delete-all", msg);
    });
});

