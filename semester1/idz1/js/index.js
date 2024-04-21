function cipher(isEncode) {
    let text = document.getElementById("inputText").value;
    let key = parseInt(document.getElementById("key").value);
    key = isEncode ? key : -key;

    let result = "";

    for (let i = 0; i < text.length; i++) {
        let charCode = text.charCodeAt(i);

        if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)) {
            let isUpperCase = charCode >= 65 && charCode <= 90;
            let offset = isUpperCase ? 65 : 97;

            let newCode = (charCode - offset + key) % 26 + offset;

            if (newCode < offset) newCode += 26;
            if (newCode > offset + 25) newCode -= 26;

            result += String.fromCharCode(newCode);
        } else {
            result += text[i];
        }
    }

    document.getElementById("result").textContent = result;
}

