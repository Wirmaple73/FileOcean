// [+] Variables
const inputFiles = $.querySelector("#uploader-input");
const dropBox = $.querySelector(".upload-box");
const uploadingContainer = $.querySelector(".uploading-container");
const uploadedContainer = $.querySelector(".uploaded-container");
const uploadedStatus = $.querySelector(".uploaded-status");
let userFiles = []

// [+] Functions
function showModal(icon, title, caption){
    swal.fire({
        icon : icon,
        title:title,
        text:caption,
        padding:"10px 20px",
        backdrop : "rgba(55, 56, 52, 0.2)"
    });
}
function importFileByClickHandler(event){
    (inputFiles.files.length > 0) && (fileValidection(inputFiles.files));
}
function importFileByDropHandler(event){
    event.stopPropagation();
    event.preventDefault();

    const dt = event.dataTransfer;
    const files = dt.files;

    (files.length > 0) && (fileValidection(files));
}
function fileValidection(files){
    for(let file of files){
        if(file.type.startsWith("image/") || file.type.startsWith("application/vnd.openxmlformats") || file.type.startsWith("video/") || file.type === "application/postscript" || file.type === "application/postscript"){
            if(file.size <= 5000000){
                insertFileUploading(file.name, file.size);
            }else{
                showModal("error", "Error !", `The size of this selected file \"${file.name}\" is large`);
            }
        }else{
            showModal("error", "Error !", `Only files with "${inputFiles.getAttribute("accept")}" extensions are accepted`);
        }
    }
}
function insertFileUploading(fileName, fileSize){
    uploadingContainer.insertAdjacentHTML("beforeend", `
         <div data-name="${fileName}" data-size="${fileSize}" class="upload-item upload-item--pending">
              <span class="upload-item__value" >${fileName}</span>
              <div class="upload-item__icon"></div>
              <div class="progress-bar">
                  <div class="progress-bar__item upload-status"></div>
              </div>
              <p class="upload-item__caption">This document is too large. Please only upload files less than 5MB.</p>
         </div>
    `);
    const progressBars = $.querySelectorAll('.progress-bar__item');
    const cancelUploadButtons = $.querySelectorAll(".upload-item__icon");
    progressBars.forEach(progressBar => progressBar.addEventListener("animationend", insetFileToDB));
    cancelUploadButtons.forEach(button => button.addEventListener("click", cancelUploadingHandler, {once:true}))
}
function insetFileToDB(){
    const file = this.parentElement.parentElement;
    const newFile = {
        id:userFiles.length + 1,
        name:file.dataset.name,
        size:file.dataset.size
    };
    file.remove();
    userFiles.push(newFile);
    insetFileUploaded(userFiles);
}
function insetFileUploaded(Files){
    uploadedContainer.innerHTML = "";
    uploadedContainer.parentElement.classList.add("uploaded-section--active");

    Files.forEach((file) => {
        uploadedContainer.insertAdjacentHTML("beforeend", `
         <div data-id="${file.id}" data-name="${file.name}" data-size="${file.size}" class="upload-item upload-item--success">
              <span class="upload-item__value" >${file.name}</span>
              <div class="upload-item__icon"></div>
              <div class="progress-bar">
                  <div class="progress-bar__item upload-status"></div>
              </div>
              <p class="upload-item__caption">This document is too large. Please only upload files less than 5MB.</p>
         </div>
    `);
        const cancelUploadButtons = $.querySelectorAll(".upload-item__icon");
        cancelUploadButtons.forEach(button => button.addEventListener("click", cancelUploadedFile, {once:true}))
    });
    calcCountUploaded()
}
function cancelUploadingHandler(){
    const file = this.parentElement.parentElement;
    file.remove();
}
function cancelUploadedFile(){
    let file = this.parentElement;
    let fileID = file.dataset.id;
    let fileName = file.dataset.name;
    let fileIndex = userFiles.findIndex(file => file.id === fileID && file.name === fileName);
    userFiles.splice(fileIndex, 1);
    file.remove();
    if(uploadedContainer.childElementCount === 0){
        uploadedContainer.parentElement.classList.remove("uploaded-section--active");
    }
    calcCountUploaded();
}
function calcCountUploaded (){
    const uploadedCount = userFiles.length;
    uploadedStatus.innerHTML = uploadedCount.toString();
}
// [+] Events
inputFiles.addEventListener("input", importFileByClickHandler, false);
dropBox.addEventListener("dragenter", importFileByDropHandler, false);
dropBox.addEventListener("dragover", importFileByDropHandler, false);
dropBox.addEventListener("drop", importFileByDropHandler, false);