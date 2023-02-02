const hiddenInputChanger = document.getElementById('edit-announcement-image')
const inputChanger = document.getElementById('input-change-clicker')
const imageName = document.getElementById('image-value')

inputChanger.addEventListener('click', () => {
    hiddenInputChanger.click()
})

function changeNameValue (element) {
    console.log("nice")
    imageName.innerText = element.value
}