$(document).ready(function () {

    $(document).on("click", "#registerBtn", function (e) {
        e.preventDefault && e.preventDefault();

        var formObj = {
            name: $("#inputName").val(),
            phoneNumber: $("#phoneNumber").val(),
            email: $("#email").val(),
            username: $("#username").val(),
            password: $("#inputPassword").val()
        };

        if (!formObj.username || !formObj.password) {
            showMessage("error", "Please fill required fields");
            return false;
        }

        $.ajax({
            method: "POST",
            url: window.PATH + "account/registerpost",
            contentType: "application/json",
            data: JSON.stringify(formObj),
            success: function (response) {
                if (response.status == "success") {
                    window.location.href = window.PATH + "home/index";
                } else {
                    showMessage(response.status, response.message);
                }
            }
        });

    });

    $(document).on("click", "#loginBtn", function (e) {
        e.preventDefault && e.preventDefault();
        var formObj = {
            username: $("#username").val(),
            password: $("#password").val()
        };

        if (!formObj.username || !formObj.password) {
            showMessage("error", "Please fill required fields");
            return false;
        }

        $.ajax({
            method: "POST",
            url: window.PATH + "account/loginpost",
            contentType: "application/json",
            data: JSON.stringify(formObj),
            success: function (response) {
                if (response.status == "success") {
                    window.location.href = window.PATH + "home/index";
                } else {
                    showMessage(response.status, response.message);
                }
            }
        });

    });

    $(document).on("click", "#hideAlert", function (e) {
        e.preventDefault && e.preventDefault();
        $("#messageBar").hide();
    });


    $(document).on("click", ".documentListItem", function (e) {
        e.preventDefault && e.preventDefault();
        var $button = $(this);
        var documentId = $button.data("id");
        getDocById(documentId, function (response) {
            $(".documentList li").removeClass("active");
            $("#documentContent").text(response.content);
            $button.parent("li").addClass("active");
        });
    });

    $(document).on("click", "#addToList", function (e) {
        e.preventDefault && e.preventDefault();
        var documentId = $("#documentSelectList").val();
        getDocById(documentId, function (response) {
            var $panel = $("#selectedDocPanelTemplate").clone().show();
            $panel.find(".panel-heading").text(response.name);
            $panel.find(".panel-body").text(response.content);
            $("#selectedDocumentsPanel").append($panel);
        });
    });

    $(document).on("click", "#uploadFile", function (e) {
        e.preventDefault && e.preventDefault();
        var fileName = $("#documentFile").val();
        if (!fileName) {
            showMessage("error", "Please choose a file");
            return false;
        }
        var reader = new FileReader();
        reader.readAsText($("#documentFile")[0].files[0]);
        reader.onload = function () {
            $.ajax({
                method: "POST",
                url: window.PATH + "document/addpost",
                contentType: "application/json",
                data: JSON.stringify({
                    name: fileName.split(/(\\|\/)/g).pop(),
                    content: reader.result
                }),
                success: function (response) {
                    showMessage(response.status, response.message);
                }
            });
        }
    });

    $(document).on("change", "#documentEditSelectList", function (e) {
        e.preventDefault && e.preventDefault();
        $("#editForm")[0].reset();
    });

    $(document).on("click", "#editDocument", function (e) {
        e.preventDefault && e.preventDefault();
        var documentId = $("#documentEditSelectList").val();
        getDocById(documentId, function (response) {
            $("#content").val(response.content);
        });
    });

    $(document).on("click", "#saveDocument", function (e) {
        e.preventDefault && e.preventDefault();
        var documentId = $("#documentEditSelectList").val();
        $.ajax({
            method: "POST",
            url: window.PATH + "document/editpost",
            contentType: "application/json",
            data: JSON.stringify({
                id: documentId,
                content: $("#content").val()
            }),
            success: function (response) {
                showMessage(response.status, response.message);
            }
        });
    });

    $(document).on("click", "#deleteDocument", function (e) {
        e.preventDefault && e.preventDefault();
        var documentId = $("#documentDeleteSelectList").val();
        $.ajax({
            method: "POST",
            url: window.PATH + "document/deletepost",
            contentType: "application/json",
            data: JSON.stringify({
                id: documentId
            }),
            success: function (response) {
                showMessage(response.status, response.message);
                window.location.reload(true);
            }
        });
    });
});

function showMessage(type, message) {
    var $messageBar = $("#messageBar");
    $messageBar.removeClass("alert-success alter-danger");
    if (type === "success") {
        $messageBar.addClass("alert-success");
    }
    else {
        $messageBar.addClass("alert-danger");
    }

    $messageBar.find(".type").text(type);
    $messageBar.find(".message").text(message);
    $messageBar.show();
}

function getDocById(id, callback) {
    $.ajax({
        method: "GET",
        url: window.PATH + "document/getbyid/" + id,
        success: callback
    });
}