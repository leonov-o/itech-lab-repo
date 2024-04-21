const gallery = document.getElementById("gallery");
let selectedImage = 0;
let images = [
    {
        src: "img_1.png",
        alt: "1",
        style: {
            width: "120px",
            height: "120px",
            borderWidth: "5px",
            borderColor: "green"
        }
    },
    {
        src: "img_2.png",
        alt: "2",
        style: {
            width: "120px",
            height: "120px",
            borderWidth: "5px",
            borderColor: "black"
        }
    },
    {
        src: "img_3.png",
        alt: "3",
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
    if (option === "alt") {
        images[selectedImage].alt = value
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
        image.alt = item.alt;
        image.style.marginTop = "5px"
        image.style.width = item.style.width;
        image.style.height = item.style.height;
        image.style.borderWidth = item.style.borderWidth;
        image.style.borderColor = item.style.borderColor;
        image.style.borderStyle = "solid";
        gallery.append(image)
    })
}

renderImages();