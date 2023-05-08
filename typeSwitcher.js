function typeSwitcher(){
    var select = document.getElementById('productType');
    var value = select.options[select.selectedIndex].value;

    var product = document.getElementsByClassName("productInput")


    var dict = {
        1: "DVD",
        2: "Book",
        3: "Furniture"
    }



    for(let i = 0; i < 3; i++) {
        product[i].style["visibility"] = "hidden";
        let inputList = product[i].querySelectorAll('.form-item')
        for(let j = 0; j < inputList.length; j++){
            inputList[j].removeAttribute("required");
        }

    }

    document.getElementById(dict[value]).style["visibility"] = "visible";

    var requiredList = document.getElementById(dict[value]).querySelectorAll('.form-item');
    for(let i = 0; i < requiredList.length; i++){
        requiredList[i].setAttribute("required", "");
    }
}
    
    

