function printId(e) {
    const div = e.target;
    console.log(div.id);
}

function deletePhoto(id) {
    const formData = new FormData();
    formData.append("id", id);

    fetch("php/delete.php", {
        method: "POST",
        body: formData
    })
        .then((response) => response.text())
        .then((data) => {
            console.log("PHP: " + data);
            window.location.reload();
        })
        .catch((error) => {
            console.error("Error:",error);
        });

    //TODO: disable context menu
}

function setVisible(div) { div.style.display = "block"; }
function hide(div) { div.style.display = "none"; }

function openUploadMenu() {
    let screenCover = document.getElementById("screen-cover");
    let uploadMenu = document.getElementById("uploadMenu");

    setVisible(screenCover);
    setVisible(uploadMenu);
}

function closeUploadMenu() {
    let screenCover = document.getElementById("screen-cover");
    let uploadMenu = document.getElementById("uploadMenu");

    hide(screenCover);
    hide(uploadMenu);
}

function openInfoMenu(id) {
    let screenCover = document.getElementById("screen-cover");
    let infoMenu = document.getElementById(`info-${id}`);

    setVisible(screenCover);
    setVisible(infoMenu);
}

function closeInfoMenu(id) {
    let screenCover = document.getElementById("screen-cover");
    let infoMenu = document.getElementById(`info-${id}`);

    hide(screenCover);
    hide(infoMenu);
}

function goToSettings() {
    window.location.href="settings.php";
}