const gallery = document.getElementById("gallery");
let selectedImage = 0;
let images = [
    {
        src: "img_1.png",
        text: "1",
        style: {
            width: "120px",
            height: "120px",
            borderWidth: "5px",
            borderColor: "green"
        }
    },
    {
        src: "img_2.png",
        text: "2",
        style: {
            width: "120px",
            height: "120px",
            borderWidth: "5px",
            borderColor: "black"
        }
    },
    {
        src: "img_3.png",
        text: "3",
        style: {
            width: "120px",
            height: "120px",
            borderWidth: "5px",
            borderColor: "black"
        }
    },
]

const changeOptions = (elem) => {
    const {id: option, value} = elem
    if (option === "textContent") {
        images[selectedImage].text = value
    } else {
        images[selectedImage].style[option] = value + "px"
    }
    renderImages()
}

const onSwap = (direction) => {
    const newIndex = direction === "вижче" ? selectedImage - 1 : selectedImage + 1;

    if (newIndex >= 0 && newIndex < images.length) {
        [images[selectedImage], images[newIndex]] = [images[newIndex], images[selectedImage]];
        selectedImage = newIndex;
        renderImages();
    }
};
const handleSelect = (index) => {
    selectedImage = index;
    images.forEach((item, i) => {
        item.style.borderColor = "black";
        if (index === i) item.style.borderColor = "green";
    })
    renderImages()
}

const renderImages = () => {
    gallery.innerHTML = ""
    images.forEach((item, index) => {
        let image = document.createElement("img");
        image.onclick = () => handleSelect(index);
        image.src = `./img/${item.src}`
        image.alt = index + 1 + "";
        image.style.marginTop = "5px"
        image.style.width = item.style.width;
        image.style.height = item.style.height;
        image.style.borderWidth = item.style.borderWidth;
        image.style.borderColor = item.style.borderColor;
        image.style.borderStyle = "solid";

        let text = document.createElement("div");
        text.textContent = item.text
        gallery.append(image)
        gallery.append(text)
    })
}

renderImages();